@customer @application
Feature: Changing customers email
  In order to use my account even if I change my email
  As a Customer
  I want to be able to change my data

  Scenario: Registering a customer
    Given I registered as "Rick Sanchez" with the "rick@morty.com" email and the "birdperson1" password
    When I change my email to "pickle@rick.com"
    Then I should be able to log in as "pickle@rick.com" with "birdperson1" password
