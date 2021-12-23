<script src="{{ asset('js/skills.js') }}" ></script>

<div class="container" data-aos="fade-up">

  <div class="section-title">
    <h2>Habilidades</h2>
    {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde esse quasi eligendi saepe, illo culpa quae modi molestiae voluptate quisquam consectetur dolorem nemo vitae, enim sit aliquam sunt blanditiis atque!</p> --}}
  </div>

  <div class="row skills-content">
    {{-- WEB FRONTEND --}}
    <div class="col-lg-3">
      @foreach ($skills->where("type", "frontend") as $skill)
        @include('portfolio.components.skills_progress_bar', ["name"=>$skill->name,"percentage"=>$skill->pivot->percentage])
      @endforeach
    </div>
    <div class="col-lg-3">
      {{-- WEB BACKEND --}}
      @foreach ($skills->where("type", "backend") as $skill)
        @include('portfolio.components.skills_progress_bar', ["name"=>$skill->name,"percentage"=>$skill->pivot->percentage])
      @endforeach
    </div>
    <div class="col-lg-3">
      {{-- DATABASE --}}
      @foreach ($skills->where("type", "database") as $skill)
        @include('portfolio.components.skills_progress_bar', ["name"=>$skill->name,"percentage"=>$skill->pivot->percentage])
      @endforeach
    </div>
    <div class="col-lg-3">
      {{-- oOTHERS --}}
      @foreach ($skills->where("type", "other") as $skill)
        @include('portfolio.components.skills_progress_bar', ["name"=>$skill->name,"percentage"=>$skill->pivot->percentage])
      @endforeach
    </div>
    {{-- @foreach ($skills as $skill)
      @include(
        'portfolio.components.skills_circle', [
          "img_path"=>$skill->path,
          "img_id"=>"$skill->name-$skill->id",
          "percentage" => $skill->pivot->percentage
        ]
      )
    @endforeach --}}

  </div>

</div>
