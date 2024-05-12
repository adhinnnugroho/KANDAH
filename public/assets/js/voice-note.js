// function voiceNote() {
//     return {
//         mediaRecorder: null,
//         audioChunks: [],
//         isRecording: false,
//         audioURL: null,
//         showMicNotFound: false,

//         startRecording() {
//             navigator.mediaDevices.getUserMedia({
//                 audio: true
//             })
//                 .then(stream => {
//                     this.mediaRecorder = new MediaRecorder(stream);

//                     this.mediaRecorder.ondataavailable = event => {
//                         if (event.data.size > 0) {
//                             this.audioChunks.push(event.data);
//                         }
//                     };

//                     this.mediaRecorder.onstop = () => {
//                         const blob = new Blob(this.audioChunks, {
//                             type: 'audio/wav'
//                         });
//                         // this.audioURL = URL.createObjectURL(blob);
//                     };

//                     this.mediaRecorder.start();
//                     this.isRecording = true;
//                 })
//                 .catch(error => {
//                     console.error('Error accessing microphone:', error);
//                     this.showMicNotFound = true;
//                 });
//         },

//         stopRecording() {
//             if (this.isRecording) {
//                 this.mediaRecorder.stop();

//                 const blob = new Blob(this.audioChunks, {
//                     type: 'audio/wav'
//                 });

//                 let formData = new FormData();
//                 formData.append('audio', blob);
//                 let formDataObject = {};
//                 formData.forEach(function (value, key) {
//                     formDataObject[key] = value;
//                 });

//                 console.table(formDataObject);
//                 Livewire.dispatch('savedAudio', {
//                     audio: formDataObject
//                 });
//                 this.isRecording = false;
//             }
//         },

//         hideMicNotFound() {
//             this.showMicNotFound = false;
//         },
//     };
// }


function voiceNote() {
    return {
        mediaRecorder: null,
        audioChunks: [],
        isRecording: false,
        audioURL: null,
        showMicNotFound: false,

        startRecording() {
            navigator.mediaDevices.getUserMedia({
                audio: true
            })
                .then(stream => {
                    this.mediaRecorder = new MediaRecorder(stream);

                    this.mediaRecorder.ondataavailable = event => {
                        if (event.data.size > 0) {
                            this.audioChunks.push(event.data);
                        }
                    };

                    this.mediaRecorder.onstop = () => {
                        const blob = new Blob(this.audioChunks, {
                            type: 'audio/wav'
                        });
                        let formData = new FormData();
                        formData.append('audio', blob);
                        console.log(formData);
                        Livewire.dispatch('savedAudio', { audio: formData });
                    };

                    this.mediaRecorder.start();
                    this.isRecording = true;
                })
                .catch(error => {
                    console.error('Error accessing microphone:', error);
                    this.showMicNotFound = true;
                });
        },

        stopRecording() {
            if (this.isRecording) {
                this.mediaRecorder.stop();
                console.log( this.mediaRecorder.stop());
                this.isRecording = false;
            }
        },

        hideMicNotFound() {
            this.showMicNotFound = false;
        },
    };
}
