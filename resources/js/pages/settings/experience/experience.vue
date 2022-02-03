<template>
  <card :title="'Experiencia'">
    <div class="form-group row">
      <div class="col-md-6 col-12">
        <!-- form create -->
        <div class="col-12">
          <form @submit.prevent="addExperience">
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
        <!-- alert errors -->
        <div class="col-12">
          <b-alert :show="errors.add.showDismissibleAlert" @dismissed="clearError('add')" variant="danger" dismissible>{{ errors.add.error }}</b-alert>
        </div>
      </div>
      <div class="col-md-6 col-12" v-if="editForm.update">
        <!-- form update -->
        <div class="col-12">
            <b-input-group prepend="name" class="mt-3">
              <b-form-input type="text" v-model="editForm.name"></b-form-input>
              <b-input-group-append>
                <form @submit.prevent="updateExperience">
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
        <!-- alert errors -->
        <div class="col-12">
          <b-alert :show="errors.edit.showDismissibleAlert" @dismissed="clearError('edit')" variant="danger" dismissible>{{ errors.edit.error }}</b-alert>
        </div>
      </div>
    </div>

    <!-- input search -->
    <b-form-input type="text" v-model="keyword" placeholder="Search"></b-form-input>

    <div class="form-group row">
      <div class="col-md-12 ml-md-auto">
        <b-pagination
          v-model="experienceTable.currentPage"
          :total-rows="experiences.length"
          :per-page="experienceTable.perPage"
          :aria-controls="experienceTable.id"
        ></b-pagination>
        <b-table
          :id="experienceTable.id"
          :items="items"
          :keyword="keyword"
          :per-page="experienceTable.perPage"
          :current-page="experienceTable.currentPage"
          :fields="experienceTable.fields"
          stacked="md"
          class="table-responsive-md"
          small
        >
          <template #cell(place)="data">
            <div> {{ data.item.place }} </div>
          </template>

          <template #cell(dates)="data">
            <div> {{ data.item.start_month }} - {{ data.item.start_year }}</div> <hr>
            <div> {{ data.item.end_month }} - {{ data.item.end_year }}</div>
          </template>

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
              <!-- <div class="col-6 pl-sm-0" v-if="data.item.social_media.length == 0"> -->
                <form @submit.prevent="deleteExperience(data.item)">
                   <v-button
                    :type="'danger'"
                    :iconPrefix="'fas'"
                    :iconName="'trash'"
                    class="btn-delete-experience"
                    :class="data.item.name"
                  ></v-button>
                </form>
              <!-- </div> -->
            </div>
          </template>

        </b-table>
        <b-pagination
          v-model="experienceTable.currentPage"
          :total-rows="experiences.length"
          :per-page="experienceTable.perPage"
          :aria-controls="experienceTable.id"
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
      experiences: [],
      newExperience: '',
      hasExperiences: [],
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
      experienceTable: {
        id: "experiences",
        perPage: 5,
        currentPage: 1,
        fields: [{
            key: 'name',
            sortable: true
          },{
            key: 'place',
            sortable: true
          },{
            key: 'dates'
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
      keyword: '',
    }),
    methods: {
      async getAll () {
        this.hasExperiences = await this.form.get('/api/user/experiences')
        if( this.hasExperiences.status === 200 ) this.experiences = this.hasExperiences.data.body.data
        this.hasExperiences = []
      },
      async editStatus( experience ) {
        await this.form.patch('/api/user/experiences/' + experience.id + '/status')
            .then((response)=>{
              this.experiences.filter((s) => {
                if( s.id == experience.id ) {
                  s.is_active = !s.is_active
                  return
                }
              })
            })
      },

      async addExperience() {
        var nf = this.newForm
        this.setValueNewForm(nf.name, true)
        await nf.post('/api/user/experiences')
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

      async updateExperience() {
        var ef = this.editForm
        this.setValueEditForm(ef.name, ef.id, ef.update, true)
        await ef.put( '/api/user/experiences/' + ef.id )
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
      edit( experience ) {
        this.editForm.name = experience.name
        this.editForm.id   = experience.id
        this.editForm.update = true
      },

      async deleteExperience( experience ) {
        var btn_delete = document.querySelector(".btn.btn-delete-experience."+experience.name)
        this.changeBtnDisabled(btn_delete, true)
        await this.form.delete('/api/user/experiences/' + experience.id )
        .then(() => {
          this.getAll ()
        })
        .catch(error => {
          this.setErrors( 'add', this.isArrayOrObject(error.response.data.body.error) )
          this.changeBtnDisabled(btn_delete, false)
          return false
        })
        return true
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

      convertStringToLowerCase(str) {
        return str.toLowerCase()
      },

      changeBtnDisabled(btn, bool) {
        if(btn) btn.disabled = bool
      }
    },
    mounted() {
      this.getAll()
    },
    computed: {
      items () {
        return this.keyword
          ? this.experiences.filter( item => this.convertStringToLowerCase(item.name).includes( this.convertStringToLowerCase(this.keyword) ) )
          : this.experiences
      }
    }
  }
</script>

