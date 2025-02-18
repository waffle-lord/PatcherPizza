#!/bin/bash

cd /root/PatcherPizza

docker compose restart

echo 'post renew hook last ran:' > rn_last
TZ=America/New_York date >> rn_last
