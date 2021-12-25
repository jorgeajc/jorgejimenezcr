<div class="container" data-aos="fade-up">
  <div class="section-title">
    <h2>Sobre mi</h2>
    <p>{{ $user->about_me }}</p>
  </div>

  <div class="row">
    <div class="col-lg-4">
      <img src="{{ asset('assets_portfolio/img/profile-img.jpg') }}" class="img-fluid" alt="">
    </div>
    <div class="col-lg-8 pt-4 pt-lg-0 content">
      <h3>{{ $user->my_carrer }}</h3>
      {{-- <p class="fst-italic">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua.
      </p> --}}
      <div class="row">
        <div class="col-lg-6">
          <ul>
            <li><i class="bi bi-chevron-right"></i> <strong>Nacimiento:</strong> <span>{{ $user->birthday }}</span></li>
            <li><i class="bi bi-chevron-right"></i> <strong>Sitio Web:</strong> <span><a href="#">{{ $user->site }}</a></span></li>
            <li><i class="bi bi-chevron-right"></i> <strong>Teléfono:</strong>
              <span>
                <a href="https://api.whatsapp.com/send?phone=506{{ $user->whatsapp }}"
                  target="_blanck"
                  onclick="gtag_whatsapp_about_me()">
                  +506 {{ $user->whatsapp }}
                  <i class="bi bi-whatsapp" style="color: green"></i>
                </a>
              </span>
            </li>
            <li><i class="bi bi-chevron-right"></i> <strong>Residencia:</strong> <span>{{ $user->address }}</span></li>
            <li>
              <i class="bi bi-chevron-right"></i>
              <strong>Curriculum vitae:</strong>
              <a href="https://drive.google.com/file/d/1-R4EH8sMch4y-FYj6QvShsnkuGqz89lg/view?usp=sharing"
                  target="_blank"
                  onclick="gtag_download_cv_about_me()">
                <i class="bx bxs-cloud-download bx-sm"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-lg-6">
          <ul>
            <li><i class="bi bi-chevron-right"></i> <strong>Edad:</strong> <span>{{ $user->age }}</span></li>
            <li><i class="bi bi-chevron-right"></i> <strong>Título:</strong> <span>{{ $user->title }}</span></li>
            <li><i class="bi bi-chevron-right"></i> <strong>Correo:</strong>
              <span>
                {{ $user->email }}
                <a href="#contact"><i class="bi bi-envelope"></i></a>
              </span>
            </li>
            <li><i class="bi bi-chevron-right"></i> <strong>Disponibilidad:</strong> <span>{{ $user->availability }}</span></li>
          </ul>
        </div>
      </div>
      {{-- <p>
        Officiis eligendi itaque labore et dolorum mollitia officiis optio vero. Quisquam sunt adipisci omnis et ut. Nulla accusantium dolor incidunt officia tempore. Et eius omnis.
        Cupiditate ut dicta maxime officiis quidem quia. Sed et consectetur qui quia repellendus itaque neque. Aliquid amet quidem ut quaerat cupiditate. Ab et eum qui repellendus omnis culpa magni laudantium dolores.
      </p> --}}
    </div>
  </div>
</div>
