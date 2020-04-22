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

## Framework comparison

I left PHP long time ago, however, it stills very relevant now days. In the last
8 month I've been working using Flask, Bottle, JS and Ruby On Rails to make some
[Microverse](https://microverse.org)'s homework.

I believe that using frameworks, make you life easy to keep you just focus in the business
logic of your app, however to make a super fast prototype or MVP to validate your
idea they become in not a very easy tool to launch something really fast and I mean
that take you 2 or 3 hours to launch a check how people interact with your product.

When I checked that this test could be coded using Laravel, I decided to check
some online videos and I found one from a guy that I follow his channel, after 15mins
of just configuring the development environment, I move back to think, Do I have
to all these steps to launch a simple API, I get use to code in Python using Bottle and
Flask.

I reckon PHP frameworks are very complex if you compare againts Flask, Django, Bottle or
Rails, where all gems or libraries make the heavy lifting for you, however, if you
don't use any PHP framework and code just vanilla PHP, this language wins to have
a product up and running in less time than any language that I know.

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

