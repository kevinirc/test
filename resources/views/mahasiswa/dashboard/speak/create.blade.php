@extends('mahasiswa.dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Insert Video</h1>
</div>

  <div class=" col-md-3 mb-3">
    <a href="/student-speak" class="badge bg-warning">
        <span data-feather="arrow-left"> </span>
      </a>
</div>
<div class=" col-md-3 mb-3">
    <p>Record first, download audio that you recorded, then upload in the form below</p>
    <button id="startRecording" class="btn btn-primary">Start Recording</button>
    <button id="stopRecording" class="btn btn-primary" disabled>Stop Recording</button>
    <div> <br><audio id="audio" controls></audio></div>
    
</div>
    <form  action="/student-speak" method="post" enctype="multipart/form-data">
    @csrf
     <br>
     <br>
     <div class=" col-md-3 mb-3">
        <label class="form-label"> Sender </label>
        <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
        <input type="hidden" id="sender" name="sender" value="{{ auth()->user()->id }}" readonly>
    </div>
    <div class=" col-md-3 mb-3">
        <label class="form-label"> Name </label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class=" col-md-3 mb-3">
        <label class="form-label"> Script </label>
        <textarea class="form-control" id="script" name="script"></textarea>
    </div>
    <div class=" col-md-3 mb-3">
        <label class="form-label"> File Type </label>
        <input type="text" class="form-control" id="file_type" name="file_type" value="record" readonly="readonly">
    </div>
      <div class="col-md-3 mb-3">
        <label class="form-label">Audio File</label>
        <input class="form-control" type="file" id="file" name="file">
      </div> 
      <br>
      <button type="submit" class="btn btn-primary">Insert Audio</button>
</form>

    <script>
        const startRecordingButton = document.getElementById('startRecording');
        const stopRecordingButton = document.getElementById('stopRecording');
        const audioElement = document.getElementById('audio');
        const audioChunks = [];

        let mediaRecorder;
        let stream;

        startRecordingButton.addEventListener('click', startRecording);
        stopRecordingButton.addEventListener('click', stopRecording);

        async function startRecording() {
            stream = await navigator.mediaDevices.getUserMedia({ audio: true });
            mediaRecorder = new MediaRecorder(stream);

            mediaRecorder.ondataavailable = (event) => {
                if (event.data.size > 0) {
                    audioChunks.push(event.data);
                }
            };

            mediaRecorder.onstop = () => {
                const audioBlob = new Blob(audioChunks, { type: 'audio/wav' });
                audioElement.src = URL.createObjectURL(audioBlob);
            };

            mediaRecorder.start();
            startRecordingButton.disabled = true;
            stopRecordingButton.disabled = false;
        }

        function stopRecording() {
            mediaRecorder.stop();
            stream.getTracks().forEach(track => track.stop());
            startRecordingButton.disabled = false;
            stopRecordingButton.disabled = true;
        }
    </script>
@endsection