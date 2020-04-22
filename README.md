# This is an example of a restful api using vanilla PHP

## Introduction

This project was created by 2 reasons; first this is a test interview and second
I decided to have an API boilerplate or blueprint to develop fast projects
using plain ()

Sometimes we are overexposed to many ads offline and online and we've lost to make
things fast and simple. I'm using these interviews to have more tools in my hand
so I don't lose my time if I don't pass it.

This requirement is from [PLM](https://www.plm.com.co/) a Colombian Marketing
company, it looks interesting.

There is no http authentication

## End points

| EndPoint | Method | Format | Variables | Comments
|-|-|-|-|-
/api/citizens/ | GET | json | | By default redirect to read.php
/api/citizens/read.php | GET | json |  |
/api/citizens/create.php | POST | json | full_name, last_name, document_number, document_type, email, mobile_phone, filename, dob | **document_type** -> c = "document", p = "passport", t = "identification card"
/api/citizens/update.php | PUT | json | id, full_name, last_name, document_number, document_type, email, mobile_phone, filename, dob |
/api/citizens/destroy.php | DELETE | json | id |



## How to use it

Just user Curl or Postman to send json data.

```json
{
  "full_name": "Joe",
  "last_name": "Apple",
  "document_number": "123456",
  "document_type": "c",
  "email": "joe@apple.com",
  "filename": "image.jpg",
  "dob": "31-12-1980",
  "mobile_phone": "3051234750"
}
```

## Resources.

- [PHP Web Site](http://php.net/)
- [How To Create A Simple REST API in PHP? Step By Step Guide!](https://www.codeofaninja.com/2017/02/create-simple-rest-api-in-php.html)
 This site has an error in the create method.

