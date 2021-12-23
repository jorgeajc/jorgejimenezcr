<div class="container" data-aos="fade-up">

  <div class="section-title">
    <h2>Contactame</h2>
  </div>

  <div class="row mt-1">

    <div class="col-lg-4">
      <div class="info">
        <div class="address">
          <i class="bi bi-geo-alt"></i>
          <h4>Ubicación:</h4>
          <p>{{ $user->address }}</p>
        </div>

        <div class="email">
          <i class="bi bi-envelope"></i>
          <h4>Correo:</h4>
          <p>{{ $user->email }}</p>
        </div>

        <div class="phone">
          <a href="https://api.whatsapp.com/send?phone=506{{ $user->whatsapp }}" target="_blanck"><i class="bi bi-phone"></i></a>
          <h4>Teléfono:</h4>
          <p><a href="https://api.whatsapp.com/send?phone=506{{ $user->whatsapp }}" target="_blanck">+506 {{ $user->whatsapp }}</a></p>
        </div>

      </div>

    </div>

    <div class="col-lg-8 mt-5 mt-lg-0">

      <form action="mail/send" method="POST" role="form" class="php-email-form">
        @csrf
        <div class="row">
          <div class="col-md-6 form-group">
            <input type="text" name="name" class="form-control" id="name" placeholder="Tu Nombre" required>
          </div>
          <div class="col-md-6 form-group mt-3 mt-md-0">
            <input type="email" class="form-control" name="email" id="email" placeholder="Tu Correo" required>
          </div>
        </div>
        <div class="form-group mt-3">
          <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" required>
        </div>
        <div class="form-group mt-3">
          <textarea class="form-control" name="message" id="message" rows="5" placeholder="Mensaje" required></textarea>
        </div>
        <div class="my-3">
          <div class="loading">Cargando</div>
          <div class="error-message"></div>
          <div class="sent-message">Tu mensaje ha sido enviado. ¡Gracias!</div>
        </div>
        <div class="text-center"><button type="submit">Enviar mensaje</button></div>
      </form>

    </div>

  </div>

</div>
