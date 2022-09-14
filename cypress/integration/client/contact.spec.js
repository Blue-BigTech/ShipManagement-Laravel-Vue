/// <reference types="cypress" />

describe('contact', () => {
  before(() => {
    cy.clearCookie('access-token')
    cy.loginBy('test_client_user')
  })

  it('top page', () => {
    cy.visit('/')
    cy.wait(10000)
  })

  it('send contact email', () => {
    cy.get('#contact-btn').click()
    cy.wait(3000)

    cy.get('#contact')
      .type('testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest')
      .blur()

    cy.visit('/contact/sended')
  })
})
