<div>

    <li class="p-2 hover:bg-gray-300 cursor-pointer  dark:text-white dark:hover:text-black text-xl font-semibold"
        id="upload-button" onclick="document.getElementById('hidden-file').click()">
        <div wire:loading wire:target="image">Loading</div>
        <div wire:loading.remove wire:target="image">Upload Foto</div>
    </li>
    <input type="file" id="hidden-file" name="hidden_file" wire:model.defer='image' onclick="preview()" class="hidden">
    @if ($showModalImage)
        <div x-data="{ open: false }" x-init="open = !open;" x-cloak>
            <x-modal.simple-modal id="feedback-modal" show_id="open" title="Drag the image to adjust" subtitle="">
                <x-slot name="icon">
                    <button wire:click="closeModal" class="text-red-600 focus:outline-none hover:text-red-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </x-slot>
                <img class="w-full h-96 object-contain" alt="Profile Image" src="" id="previewImageModal">


                <x-slot name="footer">
                    <x-button.rounded-button id="btn_image_save" class="bg-blue-500 text-ubuntu text-base w-full mt-5"
                        color="grey">
                        {{ __('Simpan') }}
                    </x-button.rounded-button>
                </x-slot>
            </x-modal.simple-modal>
        </div>
    @endif

    @push('scripts')
        <script>
            function getRoundedCanvas(sourceCanvas) {
                const canvas = document.createElement('canvas');
                const context = canvas.getContext('2d');
                const width = sourceCanvas.width;
                const height = sourceCanvas.height;

                // Mencegah canvas diperkecil dari ukuran canvas sumber asli.
                canvas.width = Math.max(width, sourceCanvas.clientWidth);
                canvas.height = Math.max(height, sourceCanvas.clientHeight);

                context.imageSmoothingEnabled = true;
                context.drawImage(sourceCanvas, 0, 0, width, height);
                context.globalCompositeOperation = 'destination-in';
                context.beginPath();

                // Menghitung radius minimum lingkaran untuk memastikan bahwa lingkaran menutupi seluruh canvas.
                const radius = Math.min(canvas.width, canvas.height) / 2;

                // Menggambar lingkaran.
                context.arc(width / 2, height / 2, radius, 0, 2 * Math.PI, true);
                context.fill();

                // Menghapus area di luar lingkaran.
                context.globalCompositeOperation = 'destination-in';
                context.arc(width / 2, height / 2, radius, 0, 2 * Math.PI, true);
                context.fill();
                context.globalCompositeOperation = 'source-over'; // Mengembalikan mode komposit ke semula

                return canvas;
            }



            function preview() {
                const inputImage = document.getElementById('hidden-file');
                const previewImage = document.getElementById('previewImageModal');
                const file = inputImage.files[0];
                const reader = new FileReader();

                reader.addEventListener('load', function() {
                    previewImage.src = reader.result;
                });

                if (file) {
                    reader.readAsDataURL(file);
                }
            }

            document.addEventListener('livewire:init', () => {
                Livewire.on('imageSelected', function(imagePath) {
                    const inputImage = document.getElementById('hidden-file');
                    var cropper;
                    const file = inputImage.files[0];
                    const reader = new FileReader();

                    reader.addEventListener('load', function() {
                        const btn_image_save = document.getElementById('btn_image_save');
                        const previewImage = document.getElementById('previewImageModal');
                        previewImage.src = reader.result;
                        // Tambahkan event listener untuk menunggu gambar pratinjau selesai dimuat
                        previewImage.onload = function() {
                            var image = previewImage;
                            var croppable = false;
                            cropper = new Cropper(image, {
                                aspectRatio: 1,
                                viewMode: 1,
                                ready: function() {
                                    croppable = true;
                                },
                            });

                            if (!croppable) {
                                return;
                            }

                            // Crop
                            var croppedCanvas = cropper.getCroppedCanvas();
                            // Round
                            var roundedCanvas = getRoundedCanvas(croppedCanvas);
                            // Show
                            var roundedImage = document.createElement('img');
                            roundedImage.src = roundedCanvas.toDataURL();
                            document.getElementById('result').innerHTML = '';
                            document.getElementById('result').appendChild(roundedImage);
                        };

                        btn_image_save.onclick = function() {
                            btn_image_save.innerHTML = 'loading...';
                            canvas = cropper.getCroppedCanvas();
                            var roundedCanvas = getRoundedCanvas(canvas);
                            @this.uploadfiletoServer(roundedCanvas.toDataURL('image/jpeg'));
                        };
                    });
                    if (file) {
                        reader.readAsDataURL(file);
                    }
                });
            });
        </script>
    @endpush
</div>
