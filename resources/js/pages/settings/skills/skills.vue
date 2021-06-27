<template>
  <card :title="$t('your_skills')">
      <div class="form-group row">
        <div class="col-md-12 ml-md-auto">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>name</th>
                <th>Active</th>
              </tr>
            </thead>
            <tbody>
              <tr v-if="loading">
                <th colspan="2">Cargando</th>
              </tr>
              <tr v-else v-for="(skill,i) in skills" :key="i">
                <th scope="row">{{ skill.name  }}</th>
                <th scope="row">{{ skill.is_active  }}</th>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
  </card>
</template>

<script>
import Form from 'vform'

export default {
  scrollToTop: false,

  metaInfo () {
    return { title: this.$t('settings') }
  },

  data: () => ({
    form: new Form({
      password: '',
      password_confirmation: ''
    }),
    skills: [],
    hasSkills: [],
    loading: true
  }),

  methods: {
    async getAll () {
      this.hasSkills = await this.form.get('/api/logic/skills')
      if( this.hasSkills.status === 200 ) {
        this.skills = this.hasSkills.data.body.data
      }
      this.loading = false
    }
  },
  mounted() {
    this.getAll()
  }
}
</script>
