#!/bin/bash
has_no_options=true;
EMAIL=""
PASS=""
QTY=""
TYPE="low"
BASE_URL="http://3.90.154.57"

while getopts e:p:q:t: option
do
case "${option}"
in
e) has_no_options=false; EMAIL=${OPTARG};;
p) has_no_options=false; PASS=${OPTARG};;
q) has_no_options=false; QTY=${OPTARG};;
t) has_no_options=false; TYPE=${OPTARG};;
esac
done

if $has_no_options ; then

  echo "$(basename "$0") -- script to create a new user or validate session and schedule a testing job
  Where:
      -e    type the email that you want to register
      -p    type the password that you want to register
      -t    type the priority that you want to schedule (low|high)
      -q    type the quantity of jobs that you want to schedule"
else
  if [ "$TYPE" == "low" ] || [ "$TYPE" == "high" ] ; then
    if [ -z "$EMAIL" ] || [ -z "$PASS" ] || [ -z "$QTY" ] || [ -z "$TYPE" ] ; then
      echo "Please fill all the arguments -e (email) and -p (password) -q (quantity)"
    else
      RESPONSE=$(curl -X POST "$BASE_URL/api/v1/register-bash?email=$EMAIL&password=$PASS");
      if [[ "$RESPONSE" == *"ERROR"* ]]; then
        echo $RESPONSE
      else
        echo "Successfully authenticated"
        SCHEDULE=$(curl -X POST "$BASE_URL/api/v1/schedule?total=$QTY&delay=0&priority=$TYPE" -H "Authorization: Bearer $RESPONSE");
        echo $SCHEDULE
      fi
    fi
  else
    echo "Please type a valid priority (low,high)"
  fi
fi
