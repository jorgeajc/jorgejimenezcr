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
                    :type="info"
                    :nativeType="submit"
                    :disabled="newForm.disabled"
                    :loading="newForm.disabled"
                  >Create</v-button>
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
                    :type="info"
                    :disabled="editForm.disabled"
                    :loading="editForm.disabled"
                  >update</v-button>
                </form>
                <form @submit.prevent="setValueEditForm">
                  <v-button
                    :disabled="editForm.disabled"
                  >x</v-button>
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
          aria-controls="my-table"
        ></b-pagination>
        <b-table
          id="my-table"
          :items="skills"
          :per-page="skillTable.perPage"
          :current-page="skillTable.currentPage"
          :fields="skillTable.fields"
          small
        >
          <template #cell(is_active)="data">
            <div class="switch-field">
              <input
                type="radio"
                value="1"
                v-model="data.item.is_active"
                v-on:change="editStatus(data.item.id)"
                v-bind:name="'status'+data.item.id"
                v-bind:id="'act'+data.item.id"
                :disabled="data.item.disabled"
                :checked="data.item.is_active"
                />
              <label v-bind:for="'act'+data.item.id">Yes</label>
              <input
                type="radio"
                value="0"
                v-model="data.item.is_active"
                v-on:change="editStatus(data.item.id)"
                v-bind:name="'status'+data.item.id"
                v-bind:id="'inac'+data.item.id"
                :checked="!data.item.is_active"
                :disabled="data.item.disabled"
                />
              <label v-bind:for="'inac'+data.item.id">No</label>
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
                    :type="info"
                  >update</v-button>
                </form>
              </div>
              <div class="col-6 pl-sm-0">
                <form @submit.prevent="deleteSkill(data.item)">
                  <v-button
                    :type="danger"
                  >delete</v-button>
                </form>
              </div>
            </div>
          </template>
        </b-table>
        <b-pagination
          v-model="skillTable.currentPage"
          :total-rows="skills.length"
          :per-page="skillTable.perPage"
          aria-controls="my-table"
        ></b-pagination>
      </div>
    </div>
  </card>

</template>

<script>
  import Form from 'vform'
  import { BPagination, BTable, BInputGroup, BFormInput, BAlert, BInputGroupAppend, BootstrapVue  } from 'bootstrap-vue'

  export default {
    scrollToTop: false,

    metaInfo () {
      return { title: this.$t('settings') }
    },
    components: {
      BTable,
      BPagination,
      BInputGroup,
      BInputGroupAppend,
      BFormInput,
      BAlert,
      BootstrapVue,
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
        this.hasSkills = await this.form.get('/api/logic/skills')
        if( this.hasSkills.status === 200 ) this.skills = this.hasSkills.data.body.data
        this.hasSkills = []
      },
      async get ( skill_id ) {
        await this.form.patch('/api/logic/skills/' + skill_id )
      },

      async editStatus( skill_id ) {
        await this.form.patch('/api/logic/skills/' + skill_id + '/status')
      },

      async addSkill() {
        var nf = this.newForm
        this.setValueNewForm(nf.name, true)
        await nf.post('/api/logic/skills')
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
        await ef.put( '/api/logic/skills/' + ef.id )
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
        await this.form.delete('/api/logic/skills/' + skill.id )
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
