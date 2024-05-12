// function getRoundedCanvas(sourceCanvas) {
//     const canvas = document.createElement('canvas');
//     const context = canvas.getContext('2d');
//     const width = sourceCanvas.width;
//     const height = sourceCanvas.height;

//     // Mencegah canvas diperkecil dari ukuran canvas sumber asli.
//     canvas.width = Math.max(width, sourceCanvas.clientWidth);
//     canvas.height = Math.max(height, sourceCanvas.clientHeight);

//     context.imageSmoothingEnabled = true;
//     context.drawImage(sourceCanvas, 0, 0, width, height);
//     context.globalCompositeOperation = 'destination-in';
//     context.beginPath();

//     // Menghitung radius minimum lingkaran untuk memastikan bahwa lingkaran menutupi seluruh canvas.
//     const radius = Math.min(canvas.width, canvas.height) / 2;

//     // Menggambar lingkaran.
//     context.arc(width / 2, height / 2, radius, 0, 2 * Math.PI, true);
//     context.fill();

//     // Menghapus area di luar lingkaran.
//     context.globalCompositeOperation = 'destination-in';
//     context.arc(width / 2, height / 2, radius, 0, 2 * Math.PI, true);
//     context.fill();
//     context.globalCompositeOperation = 'source-over'; // Mengembalikan mode komposit ke semula

//     return canvas;
// }
