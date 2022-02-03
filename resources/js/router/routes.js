function page (path) {
  return () => import(/* webpackChunkName: '' */ `~/pages/${path}`).then(m => m.default || m)
}

export default [
  { path: '/', name: 'welcome', component: page('welcome.vue') },

  { path: '/login', name: 'login', component: page('auth/login.vue') },
  { path: '/register', name: 'register', component: page('auth/register.vue') },
  { path: '/password/reset', name: 'password.request', component: page('auth/password/email.vue') },
  { path: '/password/reset/:token', name: 'password.reset', component: page('auth/password/reset.vue') },
  { path: '/email/verify/:id', name: 'verification.verify', component: page('auth/verification/verify.vue') },
  { path: '/email/resend', name: 'verification.resend', component: page('auth/verification/resend.vue') },

  { path: '/home', name: 'home', component: page('home.vue') },
  {
    path: '/settings',
    component: page('settings/index.vue'),
    children: [
      { path: '', redirect: { name: 'settings.profile' } },
      { path: 'profile', name: 'settings.profile', component: page('settings/profile.vue') },
      { path: 'password', name: 'settings.password', component: page('settings/password.vue') },

      { path: 'education' , name: 'education.index', component: page('settings/education/education.vue') },

      { path: 'experience' , name: 'experience.index', component: page('settings/experience/experience.vue') },

      { path: 'social_medias' , name: 'social_medias.index', component: page('settings/social_medias/social_medias.vue') },
      { path: 'colors' , name: 'colors.index', component: page('settings/colors/colors.vue') },

      { path: 'skills' , name: 'skills.index', component: page('settings/skills/skills.vue') },
      { path: 'levels' , name: 'levels.index', component: page('settings/levels/levels.vue') },
    ]
  },

  { path: '*', component: page('errors/404.vue') },
]
