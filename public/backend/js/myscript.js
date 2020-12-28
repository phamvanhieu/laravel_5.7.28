// function changeImg(input){
//     //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
//     if(input.files && input.files[0]){
//         var reader = new FileReader();
//         //Sự kiện file đã được load vào website
//         reader.onload = function(e){
//             //Thay đổi đường dẫn ảnh
//             $('#avatar').attr('src',e.target.result);
//         }
//         reader.readAsDataURL(input.files[0]);
//     }
// }
// $(document).ready(function() {
//     $('#avatar').click(function(){
//         $('#img').click();
//     });
// });
function fileValidation(){
    var a = document.getElementById('img').value;
    var b = a.split('.');
    var c = b.length;
    var d = b[c - 1];
    if(d == 'jpg' || d == 'png' || d == 'jpeg'){
    }else{
        alert('Chỉ Cho Phép Upload Các File Hình Ảnh: jpg,png,jpeg ');
        document.getElementById('img').value = '';
    }
    
}

