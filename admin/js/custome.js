function toSlug(title){

    let slug = title.toLowerCase(); //Chuyen tat ca cac ky tu ve chu thuong

    // Lọc dữ liệu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi,'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi,'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi,'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi,'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi,'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi,'y');
    slug = slug.replace(/đ/gi,'d');

    // Chuyển ký tự khoảng trắng thành (-)
    slug = slug.replace(/ /gi,'-');
    
    // Xóa tất cả các ký tự đặc biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi,'');

    return slug;
}

let sourceTitle = document.querySelector('.slug');
let slugRender = document.querySelector('.slug-render');

let renderLink = document.querySelector('.render-link');
if(renderLink!==null){
    let slugLink = renderLink.querySelector('span');

    let slug = '';
    if(slugRender!==null){
        slug = '/'+slugRender.value.trim();
    }

    if(slugLink!==null){
        slugLink.innerHTML = `<a href="${rootUrl+slug}">${rootUrl+slug}</a>`;
    }
}

if(sourceTitle!==null && slugRender!==null){
    sourceTitle.addEventListener('keyup',(e)=>{

        if(!sessionStorage.getItem('save_slug')){
            let title = e.target.value;
    
            if(title !== null){
                let slug = toSlug(title);
    
                slugRender.value = slug;
            }
        }
    })

    sourceTitle.addEventListener('change',(e)=>{
        sessionStorage.setItem('save_slug',1);

        // Xu ly get link url
        let slugLink = renderLink.querySelector('span a');
        let currentLink = rootUrl+'/'+prefixLink+'/'+slugRender.value+'.html';
        slugLink.href = currentLink;
        slugLink.innerHTML = currentLink;
    })

    slugRender.addEventListener('change',(e)=>{
        if(e.target.value==''){
            sessionStorage.removeItem('save_slug');
            let slug = sourceTitle.value;
            slug = toSlug(slug);
            e.target.value = slug;
        }

        let slugLink = renderLink.querySelector('span a');
        let currentLink = rootUrl+'/'+prefixLink+'/'+toSlug(slugRender.value)+'.html';
        slugLink.href = currentLink;
        slugLink.innerHTML = currentLink;
    })

    if(slugRender.value==''){
        sessionStorage.removeItem('save_slug');
    }


}

// Xu ly ckeditor
let classTextarea = document.querySelectorAll('.editor');
if(classTextarea!==null){
    classTextarea.forEach((item,index) => {
        item.id = 'editor_'+(index+1);
        CKEDITOR.replace(item.id);
    })
}

function openCkfinder(){
    let chooseImages = document.querySelectorAll('.choose-image');

    if(chooseImages!==null){
    
            chooseImages.forEach(function(item){
    
                item.addEventListener('click', function(){
                    let parentElementObj = this.parentElement;
                    if(parentElementObj){
                        while(parentElementObj){
    
                            parentElementObj = parentElementObj.parentElement;
    
                            if(parentElementObj.classList.contains('ckfinder-group')){
                                break;
                            }
                        }
    
                              //Code mở popup Ckfinder
                CKFinder.popup( {
                    chooseFiles: true,
                    width: 800,
                    height: 600,
                    onInit: function( finder ) {
                    finder.on( 'files:choose', function( evt ) {
                    let fileUrl = evt.data.files.first().getUrl();
                    //Xử lý chèn link ảnh vào input
                        parentElementObj.querySelector('.image-render').value = fileUrl;
                        console.log(fileUrl)
                    } );
                    finder.on( 'file:choose:resizedImage', function( evt ) {
                    let fileUrl = evt.data.resizedUrl;
                    //Xử lý chèn link ảnh vào input
                    parentElementObj.querySelector('.image-render').value = fileUrl;
                    } );
                    }
                    } );
                        }
                })
            })
    }
}

openCkfinder();