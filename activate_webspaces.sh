sudo /usr/local/psa/bin/subscription --list | while read -r subscription_name; do
    sudo /usr/local/psa/bin/subscription --webspace-on "$subscription_name"
done
