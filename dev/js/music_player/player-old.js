var songs;
var currentSong=0;

//var input = document.querySelector('input');

var songName = document.getElementById('songName');
var song = new Audio();
window.onload = loadAudio;
    
/*play.click(function() {
    $(this).addClass('d-none');
    $(this).next().removeClass('d-none');

    play.not($(this)).removeClass('d-none');
    pause.not($(this).next()).addClass('d-none');
});

pause.click(function() {
    $(this).addClass('d-none');
    $(this).prev().removeClass('d-none');
});
*/
/*function setWay(way)
{
  song=way;
}
*/

function rout(songs)
{
   
  // Теперь мы знаем, что foo определено.
  song.src = songs;

    
    song.play();
    
}

function loadAudio() 
{
  //song.src = songs;
  rout(songs);
  //songName.textContent =song;
  song.volume = 1;


}
function playAudio()
{
  if(song.paused)
  {
    
       song.play();
       //isPlaying=true;
      document.getElementById("play").className="fa fa-pause";
  }
  else
    {

     
      song.pause();
      document.getElementById("play").className="fa fa-play";
    }
  
}
$(document).ready(function() {
  var volumeSlider=document.getElementById('volumeSlider');

  });
function changeVolume()
 {
  // body...
    song.volume=volumeSlider.value;
}


function ForPlayback()
 {
   song.currentTime+=1;

 }
function BackPlayback()
 {
    song.currentTime-=1;
 }

 /*function next(){
  currentSong = currentSong + 1;
  loadAudio();
  song.play();
}

function previous () {
  currentSong--;
  currentSong = (currentSong < 0) ? songs.length - 1 : currentSong;
  isPlaying=true;
  loadAudio();
  song.play();
}

$(song).on('ended', function() {
    // start next track
  currentSong = currentSong + 1;
  loadAudio();
  song.play();


});
*/