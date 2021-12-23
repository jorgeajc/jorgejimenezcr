<svg id="svg-{{ $img_id }}" class="svg_skill d-none" xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 34 40"  >

  {{-- circle img --}}
  <defs>
    <pattern id="image-{{ $img_id }}" patternUnits="userSpaceOnUse" height="100" width="100">
      <image x="1" y="1" height="30" width="30" xlink:href="{{ $img_path }}"></image>
    </pattern>
  </defs>
  <circle class="zoom" class="zoom" cx="50" cy="50" r="64" fill="url(#image-{{ $img_id }})" stroke="transparent" stroke-width="1" />

  {{-- circle progress --}}
  <circle id="progress-{{$img_id}}" cx="16" cy="16" r="15.9155" class="progress-bar__progress" />

  {{-- title --}}
  <g width="200" height="100">
    <rect width="32" height="8" fill="transparent" x="0" y="32.5"></rect>
    <text x="50%" y="36"
          dominant-baseline="middle"
          text-anchor="middle"
          font-size="6"
          >
      {{ $img_id }}
    </text>
  </g>
</svg>
<script>
  var element = "{{$img_id}}",
      percentage = "{{$percentage}}"
  setPercentageComplete(percentage , "progress-"+element)
  document.querySelector("#svg-"+element).classList.remove('d-none')
</script>
