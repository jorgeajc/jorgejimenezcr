<template>
  <card :title="$t('general_skills')">
    <div class="form-group row">
      <div class="col-md-6 col-12">
        <div class="col-12">
          <form @submit.prevent="addSkill">
            <b-input-group prepend="name" class="mt-3">
                <b-form-input type="text" v-model="newForm.name"></b-form-input>
                <b-input-group-append>
                  <v-button
                    :disabled="newForm.disabled"
                    :loading="newForm.disabled"
                    :actionText="'Save'"
                  ></v-button>
                </b-input-group-append>
            </b-input-group>
          </form>
        </div>
        <div class="col-12">
          <b-alert :show="errors.add.showDismissibleAlert" @dismissed="clearError('add')" variant="danger" dismissible>{{ errors.add.error }}</b-alert>
        </div>
      </div>
      <div class="col-md-6 col-12" v-if="editForm.update">
        <div class="col-12">
            <b-input-group prepend="name" class="mt-3">
              <b-form-input type="text" v-model="editForm.name"></b-form-input>
              <b-input-group-append>
                <form @submit.prevent="updateSkill">
                  <v-button
                    :disabled="editForm.disabled"
                    :loading="editForm.disabled"
                    :actionText="'Update'"
                  ></v-button>
                </form>
                <form @submit.prevent="setValueEditForm">
                  <v-button
                    :disabled="editForm.disabled"
                    :iconPrefix="'fas'"
                    :iconName="'times-circle'"
                  ></v-button>
                </form>
              </b-input-group-append>
            </b-input-group>
        </div>
        <div class="col-12">
          <b-alert :show="errors.edit.showDismissibleAlert" @dismissed="clearError('edit')" variant="danger" dismissible>{{ errors.edit.error }}</b-alert>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-12 ml-md-auto">
        <b-pagination
          v-model="skillTable.currentPage"
          :total-rows="skills.length"
          :per-page="skillTable.perPage"
          :aria-controls="skillTable.id"
        ></b-pagination>
        <b-table
          :id="skillTable.id"
          :items="skills"
          :per-page="skillTable.perPage"
          :current-page="skillTable.currentPage"
          :fields="skillTable.fields"
          stacked="md"
          class="table-responsive-md"
          small
        >
          <template #cell(is_active)="data">
            <div class="check-status">
              <checkbox
                :id="`ckeck${data.item.id}`"
                :checked="data.item.is_active ? true : false"
                v-on:click="editStatus(data.item)"
                :class_label="data.item.is_active ? 'btn btn-success' : 'btn btn-secondary'"
              />
            </div>
          </template>

          <template #cell(created_at)="data">
            <div> {{ data.item.created_at }} </div>
          </template>

          <template #cell(actions)="data">
            <div class="row">
              <div class="col-6 pr-sm-0">
                <form @submit.prevent="edit(data.item)">
                  <v-button
                    :iconPrefix="'fas'"
                    :iconName="'edit'"
                  ></v-button>
                </form>
              </div>
              <div class="col-6 pl-sm-0">
                <form @submit.prevent="deleteSkill(data.item)">
                   <v-button
                    :type="'danger'"
                    :iconPrefix="'fas'"
                    :iconName="'trash'"
                  ></v-button>
                </form>
              </div>
            </div>
          </template>
        </b-table>
        <b-pagination
          v-model="skillTable.currentPage"
          :total-rows="skills.length"
          :per-page="skillTable.perPage"
          :aria-controls="skillTable.id"
        ></b-pagination>
      </div>
    </div>
  </card>
</template>

<script>
  import Form from 'vform'
  import { BTable, BInputGroup, BFormInput, BAlert, BInputGroupAppend, BootstrapVue, BPagination  } from 'bootstrap-vue'

  export default {
    scrollToTop: false,

    metaInfo () {
      return { title: this.$t('settings') }
    },
    components: {
      BTable,
      BInputGroup,
      BInputGroupAppend,
      BFormInput,
      BAlert,
      BootstrapVue,
      BPagination,
    },
    data: () => ({
      form: new Form(),
      newForm: new Form({
        name: '',
        disabled: false
      }),
      editForm: new Form({
        name: '',
        id: null,
        update: false,
        disabled: false
      }),
      skills: [],
      newSkill: '',
      hasSkills: [],
      errors: {
        "add": {
          "error": null,
          showDismissibleAlert: false
        },
        "edit": {
          "error": null,
          showDismissibleAlert: false
        }
      },
      skillTable: {
        id: "skills",
        perPage: 5,
        currentPage: 1,
        fields: [{
            key: 'name',
            sortable: true
          },{
            key: 'is_active'
          },{
            key: 'created_at',
            sortable: true
          },{
            key: 'actions'
          }
        ]
      },
    }),
    methods: {
      async getAll () {
        this.hasSkills = await this.form.get('/api/skills')
        if( this.hasSkills.status === 200 ) this.skills = this.hasSkills.data.body.data
        this.hasSkills = []
      },
      async get ( skill_id ) {
        await this.form.patch('/api/skills/' + skill_id )
      },

      async editStatus( skill ) {
        await this.form.patch('/api/skills/' + skill.id + '/status')
            .then((response)=>{
              this.skills.filter((s) => {
                if( s.id == skill.id ) {
                  s.is_active = !s.is_active
                  return
                }
              })
            })

      },

      async addSkill() {
        var nf = this.newForm
        this.setValueNewForm(nf.name, true)
        await nf.post('/api/skills')
        .then(() => {
          this.setValueNewForm()
          this.getAll()
          this.clearError( 'add' )
        })
        .catch(error => {
          this.setValueNewForm(nf.name, false)
          this.setErrors( 'add', this.isArrayOrObject(error.response.data.body.error) )
        })
      },

      async updateSkill() {
        var ef = this.editForm
        this.setValueEditForm(ef.name, ef.id, ef.update, true)
        await ef.put( '/api/skills/' + ef.id )
        .then(() => {
          this.setValueEditForm ()
          this.getAll ()
          this.clearError( 'edit' )
        })
        .catch(error => {
          this.setValueEditForm(ef.name, ef.id, ef.update, false)
          this.setErrors( 'edit', this.isArrayOrObject(error.response.data.body.error) )
        })
      },
      edit( skill ) {
        this.editForm.name = skill.name
        this.editForm.id   = skill.id
        this.editForm.update = true
      },

      async deleteSkill( skill ) {
        await this.form.delete('/api/skills/' + skill.id )
        .then(() => {
          this.getAll ()
        })
        .catch(error => {
          this.setErrors( 'add', this.isArrayOrObject(error.response.data.body.error) )
        })
      },

      setErrors( method, error ){
        this.errors[method].error= error
        this.setShowDismissibleAlert( method, true)
      },
      clearError( method ) {
        this.errors[method].error = null
        this.setShowDismissibleAlert( method, false)
      },

      setValueNewForm( name = "", disabled = false ) {
        this.newForm.name = name
        this.newForm.disabled = disabled
      },
      setValueEditForm( name = "", id = null, update = false, disabled = false ) {
        this.editForm.name = name
        this.editForm.id = id
        this.editForm.update = update
        this.editForm.disabled = disabled
      },

      setShowDismissibleAlert( method, boolean ){
        this.errors[method].showDismissibleAlert = boolean;
      },

      isArrayOrObject(array) {
        if( Array.isArray(array) ) {
          array = this.isArrayOrObject(array[0])
        }
        if( ( (typeof array === 'object') ) ) {
          array = this.isArrayOrObject(array[Object.keys(array)[0]])
        }
        return array
      },
    },
    mounted() {
      this.getAll()
    },
    computed: {
    }
  }
</script>

