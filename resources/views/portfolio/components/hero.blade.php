<div class="container" data-aos="zoom-in" data-aos-delay="100">
  {{-- <h1>Jorge Alberto Jiménez Carrillo</h1> --}}
  <h1>{{ $user->name }} {{ $user->last_name }}</h1>

  <p>Soy <span class="typed" data-typed-items="{{ $user->my_carrer }}"></span></p>
  <div class="social-links">
    @foreach ( $user->social_media as $social_media)
      <a href="{{$social_media->link}}" class="{{$social_media->class}}" target="_blank">
        <i class="{{$social_media->class_icon}}"></i>
      </a>
    @endforeach

    <a href="https://api.whatsapp.com/send?phone=506{{ $user->whatsapp }}" class="linkedin" target="_blanck"><i class="bx bxl-whatsapp"></i></a>
  </div>
  <div class="social-links">
    <a href="https://drive.google.com/file/d/1-R4EH8sMch4y-FYj6QvShsnkuGqz89lg/view?usp=sharing" class="linkedin" target="_blank">Descargar CV <i class="bx bxs-cloud-download"></i></a>
  </div>
</div>
