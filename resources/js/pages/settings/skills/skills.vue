<template>
  <card :title="$t('general_skills')">

    <div class="form-group row">
      <div class="col-md-12 ml-md-auto">
          <input type="text" v-model="newForm.name">
          <button v-on:click="addSkill">Create</button>
          <div v-if="newForm.errors.has('name')" v-html="newForm.errors.get('name')" />
      </div>
    </div>
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
              <tr v-for="(skill,i) in skills" :key="i">
                <th scope="row">{{ skill.name  }}</th>
                <th scope="row">
                  <div class="switch-field">

                    <input
                      type="radio"
                      value="1"
                      v-model="skill.is_active"
                      :checked="skill.is_active"
                      v-on:change="editStatus(skill.id)"
                      :disabled="skill.disabled"
                      v-bind:name="'status'+skill.id"
                      v-bind:id="'act'+skill.id"
                      />
                    <label v-bind:for="'act'+skill.id">Yes</label>

                    <input
                      type="radio"
                      value="0"
                      v-model="skill.is_active"
                      :checked="!skill.is_active"
                      v-on:change="editStatus(skill.id)"
                      :disabled="skill.disabled"
                      v-bind:name="'status'+skill.id"
                      v-bind:id="'inac'+skill.id"
                      />
                    <label v-bind:for="'inac'+skill.id">No</label>

                  </div>
                </th>
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
      form: new Form(),
      newForm: new Form({
        name: ''
      }),
      skills: [],
      newSkill: '',
      hasSkills: [],
    }),

    methods: {
      async getAll () {
        this.hasSkills = await this.form.get('/api/logic/skills')
        if( this.hasSkills.status === 200 ) this.skills = this.hasSkills.data.body.data
        this.hasSkills = []
      },
      async editStatus( skill_id ) {
        await this.form.patch('/api/logic/skills/' + skill_id + '/status')
      },
      async addSkill() {
        await this.newForm.post('/api/logic/skills')
        this.getAll ()
      }
    },
    mounted() {
      this.getAll()
    }
  }
</script>
<style>
  .switch-field {
    display: flex;
    margin-bottom: 36px;
    overflow: hidden;
  }

  .switch-field input {
    position: absolute !important;
    clip: rect(0, 0, 0, 0);
    height: 1px;
    width: 1px;
    border: 0;
    overflow: hidden;
  }

  .switch-field label {
    background-color: #e4e4e4;
    color: rgba(0, 0, 0, 0.6);
    font-size: 14px;
    line-height: 1;
    text-align: center;
    padding: 8px 16px;
    margin-right: -1px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
    transition: all 0.1s ease-in-out;
  }

  .switch-field label:hover {
    cursor: pointer;
  }

  .switch-field input:checked + label:first-of-type {
    background-color: #a5dc86;
    box-shadow: none;
  }
.switch-field input:checked + label:last-of-type {
    background-color: #f18b5b;
    box-shadow: none;
  }
  .switch-field label:first-of-type {
    border-radius: 4px 0 0 4px;
  }

  .switch-field label:last-of-type {
    border-radius: 0 4px 4px 0;
  }
</style>
