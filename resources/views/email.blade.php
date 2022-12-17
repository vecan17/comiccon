@extends('layouts.app')


@section('content')
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
    <div class="container-fluid register-img">
        <div class="row">
            <div class="page-section-container not-gradient page-section-sign-page container-fluid">
                <div class="row">
                    <div class="page-section container">
                        <div class="row">
                            <div class="header left col-lg-4 col-md-6 offset-lg-7 offset-md-3">
                                <div class="title-container">
                                    <div class="title">Registrarse</div>
                                    <div class="subtitle">
                                        <div class="signup-steps-container">
                                            <div class="step active">
                                                <div class="icon">1</div>
                                                <div class="text">Ingresar datos</div>
                                            </div>
                                            <div class="step-divider"></div>
                                            <div class="step active">
                                                <div class="icon">2</div>
                                                <div class="text">Confirmar registro</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="body col-lg-4 col-md-6 offset-lg-7 offset-md-3">
                                <div class="row">
                                    <div class="form-group-container col-lg-12">
                                        <form action="{{ route('send-email') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @include('layouts.messages')

                                            @if (Session::has('success'))
                                                <div class="alert alert-success alert-dismissible"><button type="button"
                                                        class="close">&times;</button>{{ Session::get('success') }}</div>
                                            @elseif(Session::has('failed'))
                                                <div class="alert alert-danger alert-dismissible"><button type="button"
                                                        class="close">&times;</button>{{ Session::get('failed') }}</div>
                                            @endif
                                            <div class="form-floating mb-3">
                                                <input type="text" name="Equipo" id="Equipo" class="form-control"
                                                    placeholder="Nombre Equipo" value="{{ old('Equipo') }}">
                                                <label for="floatingInput">Nombre Equipo </label>
                                                @if ($errors->has('Equipo'))
                                                    <span class="cannot-upload-message"
                                                        style="display: flex; animation: 1.5s linear 0s 1 normal none running fadeIn;">
                                                        <span
                                                            class="material-icons-outlined">error</span>{{ $errors->first('Equipo') }}
                                                        first <span
                                                            class="material-icons-outlined cancel-alert-button">cancel</span>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" name="Nombre" id="Nombre" class="form-control"
                                                    placeholder="Nombre Completo" value="{{ old('Nombre') }}">
                                                <label for="floatingInput">Nombre Completo </label>
                                                @if ($errors->has('Nombre'))
                                                    <span class="cannot-upload-message"
                                                        style="display: flex; animation: 1.5s linear 0s 1 normal none running fadeIn;">
                                                        <span
                                                            class="material-icons-outlined">error</span>{{ $errors->first('Nombre') }}
                                                        <span
                                                            class="material-icons-outlined cancel-alert-button">cancel</span>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" name="Apellido" id="Apellido" class="form-control"
                                                    placeholder="Apellido Completo" value="{{ old('Apellido') }}">
                                                <label for="floatingInput">Apellido Completo </label>
                                                @if ($errors->has('Apellido'))
                                                    <span class="cannot-upload-message"
                                                        style="display: flex; animation: 1.5s linear 0s 1 normal none running fadeIn;">
                                                        <span
                                                            class="material-icons-outlined">error</span>{{ $errors->first('Apellido') }}
                                                        <span
                                                            class="material-icons-outlined cancel-alert-button">cancel</span>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="email" name="email" id="email" class="form-control"
                                                    placeholder="Email" value="{{ old('email') }}">
                                                <label for="floatingInput">Email</label>
                                                @if ($errors->has('email'))
                                                    <span class="cannot-upload-message"
                                                        style="display: flex; animation: 1.5s linear 0s 1 normal none running fadeIn;">
                                                        <span
                                                            class="material-icons-outlined">error</span>{{ $errors->first('email') }}
                                                        <span
                                                            class="material-icons-outlined cancel-alert-button">cancel</span>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" name="celular" id="celular" class="form-control"
                                                    placeholder="Celular" value="{{ old('celular') }}">
                                                <label for="floatingInput">Celular</label>
                                                @if ($errors->has('celular'))
                                                    <span class="cannot-upload-message"
                                                        style="display: flex; animation: 1.5s linear 0s 1 normal none running fadeIn;">
                                                        <span
                                                            class="material-icons-outlined">error</span>{{ $errors->first('celular') }}
                                                        <span
                                                            class="material-icons-outlined cancel-alert-button">cancel</span>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-floating mb-3">
                                                <select class="select-control" name="Pais" id="Pais">
                                                    @if (old('Pais'))
                                                        <option value="{{ old('Pais') }}">{{ old('Pais') }}</option>
                                                    @else
                                                        <option value="" disabled selected hidden>Juegos</option>
                                                    @endif
                                                    @foreach ($Paise as $post)
                                                        <option value="{{ $post->countryname }}">
                                                            {{ $post->countryname }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('Pais'))
                                                    <span class="cannot-upload-message"
                                                        style="display: flex; animation: 1.5s linear 0s 1 normal none running fadeIn;">
                                                        <span
                                                            class="material-icons-outlined">error</span>{{ $errors->first('Pais') }}
                                                        <span
                                                            class="material-icons-outlined cancel-alert-button">cancel</span>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-floating mb-3">
                                                <select class="select-control" name="Juegos" id="Juegos">
                                                    @if (old('Juegos'))
                                                        <option value="{{ old('Juegos') }}">{{ old('Juegos') }}</option>
                                                    @else
                                                        <option value="" disabled selected hidden>Juegos</option>
                                                    @endif

                                                    @foreach ($Game as $post)
                                                        <option value="{{ $post->name }}">{{ $post->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('Juegos'))
                                                    <span class="cannot-upload-message"
                                                        style="display: flex; animation: 1.5s linear 0s 1 normal none running fadeIn;">
                                                        <span
                                                            class="material-icons-outlined">error</span>{{ $errors->first('Juegos') }}
                                                        <span
                                                            class="material-icons-outlined cancel-alert-button">cancel</span>
                                                    </span>
                                                @endif
                                            </div>

                                            {{-- <input type="file" name="emailAttachments[]" multiple="multiple" id="emailAttachments">--}}
                                            <div class="upload-files-container">
                                                <div class="drag-file-area">
                                                    <span class="material-icons-outlined upload-icon"> file_upload </span>
                                                    <h3 class="dynamic-message"> Arrastra y suelta su logo aquí </h3>
                                                    <label class="label">
                                                        or
                                                        <span class="browse-files">
                                                            <input type="file" name="emailAttachments[]"
                                                                multiple="multiple" id="emailAttachments"
                                                                class="default-file-input">
                                                            <span class="browse-files-text">buscar Archivo</span>
                                                            <span>desde el dispositivo</span>
                                                        </span>
                                                    </label>
                                                </div>
                                                @if ($errors->has('emailAttachments'))
                                                    <span class="cannot-upload-message"
                                                        style="display: flex; animation: 1.5s linear 0s 1 normal none running fadeIn;">
                                                        <span
                                                            class="material-icons-outlined">error</span>{{ $errors->first('emailAttachments') }}
                                                        <span
                                                            class="material-icons-outlined cancel-alert-button">cancel</span>
                                                    </span>
                                                @endif
                                                <span class="cannot-upload-message"> <span
                                                        class="material-icons-outlined">error</span> Please select a file
                                                    first <span
                                                        class="material-icons-outlined cancel-alert-button">cancel</span>
                                                </span>

                                                <div class="file-block">
                                                    <div class="file-info"> <span
                                                            class="material-icons-outlined file-icon">description</span>
                                                        <span class="file-name"> </span> | <span class="file-size">
                                                        </span>
                                                    </div>
                                                    <span class="material-icons remove-file-icon">delete</span>
                                                    <div class="progress-bar"> </div>
                                                </div>
                                                <button type="button" class="upload-button"> Upload </button>
                                            </div>




                                            <div class="form-check mr-auto ml-3 mt-3">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" id="policy"
                                                        name="policy" {{ old('policy', 0) ? 'checked' : '' }}>
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                    {{ __('Autorizo el Tratamiento de mis datos personales ') }}
                                                </label>
                                                @if ($errors->has('policy'))
                                                <span class="cannot-upload-message"
                                                    style="display: flex; animation: 1.5s linear 0s 1 normal none running fadeIn;">
                                                    <span
                                                        class="material-icons-outlined">error</span>{{ $errors->first('policy') }}
                                                    <span
                                                        class="material-icons-outlined cancel-alert-button">cancel</span>
                                                </span>
                                            @endif
                                            </div>

                                            <div class="orm-floating mb-3">
                                                <button type="submit" class="btn btn-success btn-block">
                                                    <div class="text">ENVIAR REGISTRO</div>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
       var isAdvancedUpload = function() {
  var div = document.createElement('div');
  return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
}();

let draggableFileArea = document.querySelector(".drag-file-area");
let browseFileText = document.querySelector(".browse-files");
let uploadIcon = document.querySelector(".upload-icon");
let dragDropText = document.querySelector(".dynamic-message");
let fileInput = document.querySelector(".default-file-input");
let cannotUploadMessage = document.querySelector(".cannot-upload-message");
let cancelAlertButton = document.querySelector(".cancel-alert-button");
let uploadedFile = document.querySelector(".file-block");
let fileName = document.querySelector(".file-name");
let fileSize = document.querySelector(".file-size");
let progressBar = document.querySelector(".progress-bar");
let removeFileButton = document.querySelector(".remove-file-icon");
let uploadButton = document.querySelector(".upload-button");
let fileFlag = 0;

fileInput.addEventListener("click", () => {
	fileInput.value = '';
	console.log(fileInput.value);
});

fileInput.addEventListener("change", e => {
	console.log(" > " + fileInput.value)
	uploadIcon.innerHTML = 'check_circle';
	dragDropText.innerHTML = 'File Dropped Successfully!';
	uploadButton.innerHTML = `Upload`;
	fileName.innerHTML = fileInput.files[0].name;
	fileSize.innerHTML = (fileInput.files[0].size/1024).toFixed(1) + " KB";
	uploadedFile.style.cssText = "display: flex;";
	progressBar.style.width = 0;
	fileFlag = 0;
});

uploadButton.addEventListener("click", () => {
	let isFileUploaded = fileInput.value;
	if(isFileUploaded != '') {
		if (fileFlag == 0) {
    		fileFlag = 1;
    		var width = 0;
    		var id = setInterval(frame, 50);
    		function frame() {
      			if (width >= 250) {
        			clearInterval(id);
					uploadButton.innerHTML = `<span class="material-icons-outlined upload-button-icon"> check_circle </span> Uploaded`;
      			} else {
        			width += 5;
        			progressBar.style.width = width + "px";
      			}
    		}
  		}
	} else {
		cannotUploadMessage.style.cssText = "display: flex; animation: fadeIn linear 1.5s;";
	}
});

cancelAlertButton.addEventListener("click", () => {
	cannotUploadMessage.style.cssText = "display: none;";
});

if(isAdvancedUpload) {
	["drag", "dragstart", "dragend", "dragover", "dragenter", "dragleave", "drop"].forEach( evt =>
		draggableFileArea.addEventListener(evt, e => {
			e.preventDefault();
			e.stopPropagation();
		})
	);

	["dragover", "dragenter"].forEach( evt => {
		draggableFileArea.addEventListener(evt, e => {
			e.preventDefault();
			e.stopPropagation();
			uploadIcon.innerHTML = 'file_download';
			dragDropText.innerHTML = 'Drop your file here!';
		});
	});

	draggableFileArea.addEventListener("drop", e => {
		uploadIcon.innerHTML = 'check_circle';
		dragDropText.innerHTML = 'File Dropped Successfully!';
		uploadButton.innerHTML = `Upload`;

		let files = e.dataTransfer.files;
		fileInput.files = files;
		console.log(files[0].name + " " + files[0].size);
		console.log(document.querySelector(".default-file-input").value);
		fileName.innerHTML = files[0].name;
		fileSize.innerHTML = (files[0].size/1024).toFixed(1) + " KB";
		uploadedFile.style.cssText = "display: flex;";
		progressBar.style.width = 0;
		fileFlag = 0;
	});
}

removeFileButton.addEventListener("click", () => {
	uploadedFile.style.cssText = "display: none;";
	fileInput.value = '';
	uploadIcon.innerHTML = 'file_upload';
	dragDropText.innerHTML = 'Drag & drop any file here';
	uploadButton.innerHTML = `Upload`;
});
    </script>
@endsection
