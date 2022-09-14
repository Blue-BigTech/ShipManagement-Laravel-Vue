/// <reference types="cypress" />

describe('visit top page', () => {
  before(() => {
    cy.loginBy('test_client_user')
  })

  it('top page', () => {
    cy.visit('/')
  })
})
