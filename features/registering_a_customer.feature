@customer
Feature: Registering a customer
  In order to be able to use application fully
  As a Customer
  I want to register

  Scenario: Registering a customer
    When I register the "Rick Sanchez" customer with the "rick@morty.com" email and the "birdperson1" password
    Then I should be able to log in as "rick@morty.com" with "birdperson1" password
