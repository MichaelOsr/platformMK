let playMusic = () => {
  let play = document.getElementById('play')
  let pause = document.getElementById('pause')
  let audio = document.getElementById('audio')
  let img = document.getElementById('imgMusic')

  let hidden = 'hidden'

  if(pause.classList.contains(hidden)) {
    play.classList.add(hidden)
    pause.classList.remove(hidden)
    audio.play()
    img.classList.remove('paused')
    img.classList.add('running')
  } else {
    play.classList.remove(hidden)
    pause.classList.add(hidden)
    audio.pause()
    img.classList.remove('running')
    img.classList.add('paused')
  }
  
}