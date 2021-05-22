# simplewebsite

Welcome to a simple website. Uses the front controller pattern to locate an appropriate callable, in this case PageController::execute. Controllers extend from the base Controller class and implement an execute method that returns a/the response object.

Modules are turned into templates, templates are parsed and passed to Response. Templates always extend either from a TemplateManager or from a base template. The execute method of the TemplateManager ( which also extends Controller ) parses the base template and all members of that template and prints that output to the screen.

The PageController sits on top of the application controlling the Page object. The Page object marshalls all the features of the current page request by the Request object and then feeds the output to the Response which is then printed by the execute method of the page controller.

Essentially, this is a simple set of controllers and helpers that manipulate templates based on a specific "title" request which is then passed to the response to be output by the controller chosen to run the application by the FrontController.
