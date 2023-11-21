## API DÀNH CHO FRONTEND DEVELOPER

## General

**base_url:** `http://api-learn-frontend.suntech.edu.vn`

**content-type: "application/json**

**Authorization: Bearer access_token**

## Register
- URI: `/api/v1/register`
- Method: `POST`

- #### Parameters: `no`

- #### Request body:
    | Name      | Type | Validate     |
    | :---        |    :----:   |          ---: |
    | name      | string       | required   |
    | email   | string        | required, format email    |
    | password   | string        | required      |


- #### Responses
    - **Success**
    ```
    {
        "status": true,
        "code": 200,
        "message": "success",
        "data": {
            "user": {
                "id": 1,
                "parent_id": 0,
                "name": "suntech academy",
                "email": "suntechacademy@gmail.com",
                "phone": null,
                "address": null,
                "email_verified_at": null,
                "bio": null,
                "socials": null,
                "deleted_at": null,
            },
            "access_token": "1|koUCOSQG2hbV5efhKZWYKpmvbN5xCv9wYVpwbV7zd632fbdd"
        }
    }
    ```
    - **Errors**
        - **Error Code 422**
            ```
            {
                "status": false,
                "code": 422,
                "message": "Thông tin không hợp lệ",
                "errors": {
                    "email": "Email không đúng định dạng",
                    "password": "Mật khẩu không được bỏ trống"
                }
            }
            ```

        - **Error Code 500**
            ```
            {
                "status": false,
                "code": 500,
                "message": "Đăng ký không thành công"
            }
            ```
            
## Login
- URI: `/api/v1/login`
- Method: `POST`

- #### Parameters: `no`

- #### Request body:
    | Name      | Type | Validate     |
    | :---        |    :----:   |          ---: |
    | email   | string        | required|
    | password   | string        | required      |


- #### Responses
    - **Success**
    ```
    {
        "status": true,
        "code": 200,
        "message": "success",
        "data": {
            "user": {
                "id": 1,
                "parent_id": 0,
                "name": "suntech academy",
                "email": "suntechacademy@gmail.com",
                "phone": null,
                "address": null,
                "email_verified_at": null,
                "bio": null,
                "socials": null,
                "deleted_at": null,
            },
            "access_token": "1|koUCOSQG2hbV5efhKZWYKpmvbN5xCv9wYVpwbV7zd632fbdd"
        }
    }
    ```
    - **Errors**
        - **Error Code 422**
            ```
            {
                "status": false,
                "code": 422,
                "message": "Thông tin không hợp lệ",
                "errors": {
                    "email": "Email không đúng định dạng",
                    "password": "Mật khẩu không được bỏ trống"
                }
            }
            ```

        - **Error Code 500**
            ```
            {
                "status": false,
                "code": 500,
                "message": "Đăng nhập thất bại"
            }
            ```
            

## List user
- URI: `/api/v1/user`
- Method: `GET`

- #### Parameters:
    | Name      | Type | Validate     |
    | :---        |    :----:   |          ---: |
    | name   | string        | No |

- #### Request body: `no`


- #### Responses:
    - **Success**
    ```
    {
        "status": true,
        "code": 200,
        "message": "success",
        "data": {
            "users": [
                {
                    "id": 1,
                    "parent_id": 0,
                    "name": "suntech academy",
                    "email": "suntechacademy@gmail.com",
                    "phone": null,
                    "address": null,
                    "email_verified_at": null,
                    "bio": null,
                    "socials": null,
                    "deleted_at": null,
                    "created_at": "2023-11-03T09:34:09.000000Z",
                    "updated_at": "2023-11-03T09:34:09.000000Z"
                }
            ],
            "meta": {
                "total": 1,
                "per_page": 15,
                "current_page": 1,
                "last_page": 1,
                "from": 1,
                "to": 1
            }
        }
    }
    ```
    - **Errors**
        - **Error Code 401**
            ```
            {
                "status": false,
                "code": 401,
                "message": "Unauthorized!"
            }
            ```

        - **Error Code 500**
            ```
            {
                "status": false,
                "code": 500,
                "message": "Lỗi hệ thống"
            }
            ```
## Create user
- URI: `/api/v1/user`
- Method: `POST`

- #### Parameters: `no`

- #### Request body:
    | Name      | Type | Validate     |
    | :---        |    :----:   |          ---: |
    | name      | string       | required   |
    | email   | string        | required, format email    |
    | password   | string        | required      |
    | password_confirmation   | string        | required
    | phone   | number        | required      |required      |
    | gender   | string        | required      |
    | avatar   | string        |       |


- #### Responses
    - **Success**
    ```
    {
        "status": true,
        "code": 200,
        "message": "success",
        "data": null
    }
    ```
    - **Errors**
        - **Error Code 401**
            ```
            {
                "status": false,
                "code": 401,
                "message": "Unauthorized!"
            }
            ```

        - **Error Code 422**
            ```
            {
                "status": false,
                "code": 422,
                "message": "Thông tin không hợp lệ",
                "errors": {
                    "name": "Họ và tên không được bỏ trống",
                    "email": "Email không đúng định dạng",
                    "phone": "Số điện thoại không được để trống",
                    "address": "The address field must be a string.",
                    "password": "Mật khẩu không được nhỏ hơn 6 ký tự",
                    "password_confirmation": "Mật khẩu nhập lại không được nhỏ hơn 6 ký tự"
                }
            }
            ```

        - **Error Code 500**
            ```
            {
                "status": false,
                "code": 500,
                "message": "Lỗi hệ thống"
            }
            ```

## Update user
- URI: `/api/v1/user/:id`
- Method: `PUT`

- #### Parameters: `no`

- #### Request body:
    | Name      | Type | Validate     |
    | :---        |    :----:   |          ---: |
    | name      | string       | required   |
    | email   | string        | required, format email    |
    | password   | string        | required      |
    | password_confirmation   | string        | required
    | phone   | number        | required      |required      |
    | gender   | string        | required      |
    | address   | string        | required      |
    | avatar   | string        |       |


- #### Responses
    - **Success**
    ```
    {
        "status": true,
        "code": 200,
        "message": "success",
        "data": null
    }
    ```
    - **Errors**
        - **Error Code 401**
            ```
            {
                "status": false,
                "code": 401,
                "message": "Unauthorized!"
            }
            ```

        - **Error Code 422**
            ```
            {
                "status": false,
                "code": 422,
                "message": "Thông tin không hợp lệ",
                "errors": {
                    "name": "Họ và tên không được bỏ trống",
                    "email": "Email không đúng định dạng",
                    "phone": "Số điện thoại không được để trống",
                    "address": "The address field must be a string.",
                    "password": "Mật khẩu không được nhỏ hơn 6 ký tự",
                    "password_confirmation": "Mật khẩu nhập lại không được nhỏ hơn 6 ký tự"
                }
            }
            ```

        - **Error Code 500**
            ```
            {
                "status": false,
                "code": 500,
                "message": "Lỗi hệ thống"
            }
            ```

## Show user
- URI: `/api/v1/user/:id`
- Method: `GET`

- #### Parameters: `no`

- #### Request body: `no`

- #### Responses
    - **Success**
    ```
    {
        "status": true,
        "code": 200,
        "message": "success",
        "data": null
    }
    ```
    - **Errors**
        - **Error Code 401**
            ```
            {
                "status": false,
                "code": 401,
                "message": "Unauthorized!"
            }
            ```

        - **Error Code 500**
            ```
            {
                "status": false,
                "code": 500,
                "message": "Lỗi hệ thống"
            }
            ```

## Delete user
- URI: `/api/v1/user/:id`
- Method: `Delete`

- #### Parameters: `no`

- #### Request body: `no`

- #### Responses
    - **Success**
    ```
    {
        "status": true,
        "code": 200,
        "message": "success",
        "data": null
    }
    ```
    - **Errors**
        - **Error Code 401**
            ```
            {
                "status": false,
                "code": 401,
                "message": "Unauthorized!"
            }
            ```

        - **Error Code 500**
            ```
            {
                "status": false,
                "code": 500,
                "message": "Lỗi hệ thống"
            }
            ```

## Upload file
- URI: `/api/v1/upload-file`
- Method: `POST`

- #### Parameters: `no`

- #### Request body:
    | Name      | Type | Validate     |
    | :---        |    :----:   |          ---: |
    | file      | Object       | required, mimes:jpg,png,gif,csv,xls,webp, max:3000   |


- #### Responses
    - **Success**
    ```
    {
        "status": true,
        "code": 200,
        "message": "success",
        "data": {
            "file_url": "/storage/media/6NCbAON1tzYtqNto3AKxvbIwCLvlffBz3vVE1bK2.png"
        }
    }
    ```
    - **Errors**
        - **Error Code 401**
            ```
            {
                "status": false,
                "code": 401,
                "message": "Unauthorized!"
            }
            ```

        - **Error Code 422**
            ```
            {
                "status": false,
                "code": 422,
                "message": "Thông tin không hợp lệ",
                "errors": {
                    "file": "Vui lòng chọn file",
                }
            }
            ```

        - **Error Code 500**
            ```
            {
                "status": false,
                "code": 500,
                "message": "Lỗi hệ thống"
            }
            ```
