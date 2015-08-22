
# HTTP interoperability interfaces and standard implementations


A small set of interfaces to allow people to re-use libaries across projects.


## The interfaces

* Request

* Response

* Body



## Guide for creating Body implementations

Contrary to standard coding practices, it is preferable for implementations of the body interface that all the work that is done in the constructor. This allows any problems to be detected before the response starts to be sent, and so avoid any possible confusion about which headers have been sent.

For example, the FileBody implementation opens the file to be sent in the constructor and holds the FileHandle open until the FileBody is sent. This ensures that any errors in opening the file occur inside the application code, rather than the framework code.

Similarly the JsonBody does the json_encode'ing inside the constructor, so that any exception are, again, reported inside the application code creating the JsonBody, rather than in the framework code when it sends the JsonBody.

## Install git pre-commit hook

Please install the git pre-commit in the ./test/git_hooks directory to have the code style checks done before committing. Although they will get picked up by the CI tool, it is a courtesy to other developers to avoid committing broken stuff. 