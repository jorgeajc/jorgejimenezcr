function onmouseovercustom(svg_use_id, circle_id_1, circle_id_2){
  var elemt_use = document.getElementById(svg_use_id),
      elemt_circle_1 = document.getElementById(circle_id_1),
      elemt_circle_2 = document.getElementById(circle_id_2)
  elemt_use.href.baseVal = "#"+circle_id_1
  elemt_circle_1.classList.add('zoom')
  elemt_circle_2.setAttribute('r', 0)
}
function onmouseoutcustom(svg_use_id, circle_id_1, circle_id_2){
  var elemt_use = document.getElementById(svg_use_id),
    elemt_circle_1 = document.getElementById(circle_id_1),
      elemt_circle_2 = document.getElementById(circle_id_2)
  elemt_use.href.baseVal = "#"+circle_id_2
  elemt_circle_1.classList.remove('zoom')
  elemt_circle_2.setAttribute('r', 50)
}
