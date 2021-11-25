import Vue from 'vue'
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

// import { } from '@fortawesome/free-regular-svg-icons'

import {
  faUser, faLock, faSignOutAlt, faCog, faTimesCircle, faEdit, faTrash
} from '@fortawesome/free-solid-svg-icons'

import {
  faGithub
} from '@fortawesome/free-brands-svg-icons'

library.add(
  faGithub,

  faUser, faLock, faSignOutAlt, faCog, faTimesCircle, faEdit, faTrash
)

Vue.component('Fa', FontAwesomeIcon)
