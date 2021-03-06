
// 读取本地文件为URL，并且回调
function readFile(fileId, callback) {
    if (window.FileReader) {
        const input = document.getElementById(fileId);
        const file = input.files[0];
        const reader = new FileReader();
        reader.onload = function () {
            callback(this.result);
        };
        reader.readAsDataURL(file);
    }
}