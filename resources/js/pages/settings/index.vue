<template>
  <div class="row">
    <div class="col-md-3">
      <card :title="$t('settings')" class="settings-card">
        <ul class="nav flex-column nav-pills">
          <li v-for="tab in tabs" :key="tab.route" class="nav-item">
            <router-link :to="{ name: tab.route }" class="nav-link" active-class="active">
              <fa :icon="tab.icon" fixed-width />
              {{ tab.name }}
            </router-link>
          </li>
        </ul>
      </card>
    </div>

    <div class="col-md-9">
      <transition name="fade" mode="out-in">
        <router-view />
      </transition>
    </div>
  </div>
</template>

<script>
export default {
  middleware: 'auth',

  computed: {
    tabs () {
      return [
        {
          icon: 'user',
          name: this.$t('profile'),
          route: 'settings.profile'
        },
        {
          icon: 'lock',
          name: this.$t('password'),
          route: 'settings.password'
        },
        // education
        {
          icon: 'user',
          name: "Educación",
          route: 'education.index'
        },

        // experience
        {
          icon: 'user',
          name: "Experiencia",
          route: 'experience.index'
        },

        // social media and colors
        {
          icon: 'user',
          name: "Medios Sociales",
          route: 'social_medias.index'
        },
        {
          icon: 'user',
          name: "Colores",
          route: 'colors.index'
        },

        // skills, levels
        {
          icon: 'user',
          name: "Habilidades",
          route: 'skills.index'
        },
        {
          icon: 'user',
          name: "Niveles",
          route: 'levels.index'
        },
      ]
    }
  }
}
</script>

<style>
.settings-card .card-body {
  padding: 0;
}
</style>
