## Route

+--------+----------+-------------------------------------------------+-----------------------+---------------------------------------------------+------------+
| Domain | Method   | URI                                             | Name                  | Action                                            | Middleware |
+--------+----------+-------------------------------------------------+-----------------------+---------------------------------------------------+------------+
|        | GET|HEAD | /                                               |                       | Closure                                           |            |
|        | GET|HEAD | api/v1/question                                 | api.v1.question.index | App\Http\Controllers\QuestionController@index     |            |
|        | GET|HEAD | api/v1/question/{question}                      | api.v1.question.show  | App\Http\Controllers\QuestionController@show      |            |
|        | GET|HEAD | api/v1/reply                                    | api.v1.reply.index    | App\Http\Controllers\ReplyController@index        |            |
|        | GET|HEAD | api/v1/reply/{reply}                            | api.v1.reply.show     | App\Http\Controllers\ReplyController@show         |            |
|        | POST     | api/v1/user                                     | api.v1.user.store     | App\Http\Controllers\UserController@store         |            |
|        | GET|HEAD | api/v1/user                                     | api.v1.user.index     | App\Http\Controllers\UserController@index         |            |
|        | POST     | api/v1/user/{name}/question                     |                       | App\Http\Controllers\UserQuestionController@store |            |
|        | GET|HEAD | api/v1/user/{name}/question                     |                       | App\Http\Controllers\UserQuestionController@index |            |
|        | POST     | api/v1/user/{name}/question/{question_id}/reply |                       | App\Http\Controllers\UserReplyController@store    |            |
|        | GET|HEAD | api/v1/user/{name}/reply                        |                       | App\Http\Controllers\UserReplyController@index    |            |
|        | GET|HEAD | api/v1/user/{user}                              | api.v1.user.show      | App\Http\Controllers\UserController@show          |            |
+--------+----------+-------------------------------------------------+-----------------------+---------------------------------------------------+------------+