<div class="div-circle">
  <svg class="svg-circle" >
    {{-- circle blue --}}
    <g transform="rotate(-90 70 70)"  transform="scale(1.5)" >
      <circle class="progress-circle" stroke-dashoffset="339.5" stroke-dasharray="339.5"
              cx="90" cy="50" r="50" fill="none" stroke="#f00" stroke-width="8" >
        <animate attributeName="stroke-dashoffset" begin="0s" dur="1s" values="339.5;0" fill="freeze" />
      </circle>
    </g>

    {{-- circle blue --}}
    <defs>
      <pattern id="{{ $img_id }}" patternUnits="userSpaceOnUse" height="100" width="100">
        <image x="0" y="0" height="100" width="100" xlink:href="{{ $img_path }}"></image>
      </pattern>
    </defs>
    <circle class="zoom" class="zoom" cx="50" cy="50" r="45" fill="url(#{{ $img_id }})" stroke="transparent" stroke-width="1" />
  </svg>
</div>
