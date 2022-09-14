Cypress.Commands.add('login', (email, password) => {
  cy.visit('/')
  cy.wait(5000)
  cy.get('#user-id')
    .type(email)
    .blur()
  cy.get('#password')
    .type(password)
    .blur()
  cy.get('#login-btn').click()
  cy.wait(3000)
})

Cypress.Commands.add('loginBy', userName => {
  const loginUsers = Cypress.env('login_users')
  const user = loginUsers[userName]
  if (!user.email || !user.password) {
    throw `cypress.env.jsonのlogin_users.${userName}に値が設定されていません`
  }

  cy.login(user.email, user.password)
})
