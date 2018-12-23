<html>
    <head>
        <title>Html5 Player</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12 bg-primary text-white text-center">
                    <h2>HTML5 MEDIA PLAYER</h2>
                </div>
                <div class="col-md-6 bg-dark offset-md-3 my-5 px-0 text-white">
                    <div class="col-md-12" >
                        <video style="width:100%" id="media_player">
                            <source src="trial.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="col-md-12 bg-light text-white px-0">
                        <progress  id='progress-bar' min='0' max='100' value='0' style="width:100%;background-color: black;color:green"></progress>
                    </div>
                    <div class="col-md-12 bg-primary text-white py-2 px-0" id="media_controls">
                        <span style="display:inline-block" class="px-2" onclick="togglePlayPause()" id="playPauseBtn"><i class="fas fa-play"></i></span>
                        <span onclick="stop()" style="display:inline-block" class="px-2" id="stopBtn"><i class="fas fa-stop"></i></span>
                        <span onclick="volumeUp()" style="display:inline-block" class="px-2"><i class="fas fa-volume-off"> <i class="fas fa-plus" style="font-size:10px;position:relative;top:-2px"></i></i></span>
                        <span onclick="volumeDown()" style="display:inline-block" class="px-2"><i class="fas fa-volume-off"> <i class="fas fa-minus" style="font-size:10px;position:relative;top:-2px"></i></i></span>
                        <span onclick="mute()" style="display:inline-block" class="px-2" id="muteBtn"><i class="fas fa-volume-mute"></i></span>
                        <span onclick="replay()" style="display:inline-block" class="px-2" id="muteBtn"><i class="fas fa-redo-alt"></i></span>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <script>
            $(document).ready(function(){
                media_settings();
                var media_player = document.getElementById('media_player');
                media_player.addEventListener('timeupdate',updateProgressBar, false);
                
            });
            
            $('#progress-bar').click(function(e) {
               // console.log($(this).offset().left);
                var posX = $(this).offset().left, posY = $(this).offset().top;
                alert((e.pageX - posX)+ ' , ' + (e.pageY - posY));
            });
            
            function updateProgressBarValue(e){
                alert('hello');
                console.log($(e).offset().left);
            }
            
            function updateProgressBar(){
                var mediaPlayer = document.getElementById('media_player');
                var progressBar = document.getElementById('progress-bar');
               var percentage = Math.floor((100 / mediaPlayer.duration) *
               mediaPlayer.currentTime);
               progressBar.value = percentage;
              
            }
            
            function media_settings(){
                $('#media_player').controls = false;
            }
            
            function replay(){
                $('#media_player').get(0).currentTime = 0;
                $('#playPauseBtn').html('<i class="fas fa-pause"></i>');
            }
            
            function togglePlayPause(){
                if($('#media_player').get(0).paused || $('#media_player').get(0).ended){
                    $('#media_player').get(0).play();
                    $('#playPauseBtn').html('<i class="fas fa-pause"></i>');
                }else{
                    $('#media_player').get(0).pause();
                    $('#playPauseBtn').html('<i class="fas fa-play"></i>');
                }
            }
            
            function mute(){
                if($('#media_player').get(0).muted){
                    $('#media_player').get(0).muted = false;
                }else{
                    $('#media_player').get(0).muted = true;
                }
            }
            
            function stop(){
                $('#media_player').get(0).pause();
                $('#media_player').get(0).currentTime = 0;
                $('#playPauseBtn').html('<i class="fas fa-play"></i>');
            }
            
            function volumeUp(){
                console.log($('#media_player').get(0).volume);
                $('#media_player').get(0).volume += $('#media_player').get(0).volume == 1 ? 0:0.1; 
            }
            
            function volumeDown(){
                console.log($('#media_player').get(0).volume);
                if($('#media_player').get(0).volume < 0.2){
                    $('#media_player').get(0).volume =0;
                }else{
                    $('#media_player').get(0).volume -= $('#media_player').get(0).volume == 0 ? 0:0.1;
                }
                 
            }
        </script>
        
    </body>
</html>