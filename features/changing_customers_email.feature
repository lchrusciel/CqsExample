@customer @application @api
Feature: Changing customers email
  In order to use my account even if I change my email
  As a Customer
  I want to be able to change my data

  Scenario: Changing customer email
    Given I registered as "Rick Sanchez" with the "rick@morty.com" email and the "birdperson1" password
    When I change my email to "pickle@rick.com"
    Then I should be able to log in as "pickle@rick.com" with "birdperson1" password

  Scenario: Changing customer email to wrong value
    Given I registered as "Rick Sanchez" with the "rick@morty.com" email and the "birdperson1" password
    When I try to change my email to "pickle"
    Then I should be notified that this email is wrong
