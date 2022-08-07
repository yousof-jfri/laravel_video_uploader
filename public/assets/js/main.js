// variables form
const form = document.querySelector('#upload');
const progress = document.querySelector('#progress');
const progressBar = progress.querySelector('#progress-bar');
const progressNum = progress.querySelector('#progress-number');
const successMessage = document.querySelector('#success-message');
const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

const mainAddress = 'http://127.0.0.1:8000/';

// event listeners
form.addEventListener('submit', (e) => submitForm(e))


// functions
function submitForm(e)
{
    e.preventDefault();
    let video = form.querySelector(`input[name='file']`).files[0];
    let name = form.querySelector(`input[name='name']`).value;

    // check the video exists or not
    if(video)
    {
        let formData = new FormData();
        formData.append('file', video);
        formData.append('name', name); 
        formData.append('_token', csrfToken)

        // send ajax request
        let xhr = new XMLHttpRequest();

        xhr.upload.addEventListener('progress', progressHandler);

        xhr.addEventListener('load', completeHandler)

        xhr.open('POST', mainAddress + 'upload', true)
        xhr.send(formData)
    }
}

function completeHandler()
{
    // show progress bar
    progress.classList.add('hidden');
    successMessage.classList.remove('hidden')
    
    setTimeout(() => {
        successMessage.classList.add('hidden')
    }, 3000)
}

function progressHandler(e)
{
    progress.classList.remove('hidden');
    let percent = (e.loaded / e.total) * 100;
    progressBar.style.width = percent + '%';
    progressNum.innerHTML = Math.floor(percent) + '%';
}