<div class="container" data-aos="fade-up">

  <div class="section-title">
    <h2>Resumen</h2>
    {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit.
      Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
  </div>

  <div class="row">
    <div class="col-lg-6">
      <h3 class="resume-title">Resumen</h3>
      <div class="resume-item pb-0">
        <h4>{{ $user->name }} {{ $user->name }}</h4>
        <p>
          <em>
            {{ $user->about_me }}
          </em>
        </p>
        <ul>
          <li>{{ $user->address }}</li>
          <li>
            <a href="https://api.whatsapp.com/send?phone=506{{ $user->whatsapp }}"
              target="_blanck"
              onclick="gtag_whatsapp_summary()">
              +506 {{ $user->whatsapp }}
            </a>
          </li>
          <li>{{ $user->email }}</li>
        </ul>
      </div>

      <h3 class="resume-title">Educación</h3>
      @foreach ($user->educations as $education)
        <div class="resume-item">
          <h4>{{ $education->name }}</h4>
          <h5> {{ $education->startEndDate }} </h5>
          <p><em>{{ $education->place }}</em></p>
          {{-- <p>Qui deserunt veniam. Et sed aliquam labore tempore sed quisquam iusto autem sit. Ea vero voluptatum qui ut dignissimos deleniti nerada porti sand markend</p> --}}
        </div>
      @endforeach
    </div>
    <div class="col-lg-6">
      <h3 class="resume-title">Experiencia Profesional</h3>
      @foreach ($user->experiences as $experience)
        <div class="resume-item">
          <h4>{{ $experience->name }}</h4>
          <h5> {{ $experience->startDate }} - {{ $experience->endDate }} </h5>
          <p><em>{{ $experience->place }}</em></p>
          <ul>
            @foreach ($experience->details as $detail)
              <li>{{ $detail->description }}</li>
            @endforeach
          </ul>
        </div>
      @endforeach
    </div>
  </div>

</div>
