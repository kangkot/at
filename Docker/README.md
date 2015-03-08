## Admin

    docker ps
    docker logs  -f box_name  # -f is like tail -f
    docker stop     box_name  # stop it
    docker top       box_name  # top process inside the box
    docker inspect box_name # get box status, data return in json format

### Manage images

    docker images         # list images
    docker rmi -f SHA     # Remove image by SHA
    docker search php     # Search for PHP image
    docker pull   centos  # Get public `centos` image, nth time, will pull new changes of image.
    docker rmi    centos  # Remove `centos` image

### Manage containers

    docker ps -a       # List all container
    docker rm NAME     # Remove container by name, we can use SHA for this too.
    docker start NAME  # Start a container
    docker stop  NAME  # Stop a container
    docker attach NAME # Run container's bash console

#### Commit

    docker commit \
      -m "Added json gem" \
      -a "Kate Smith" \
      0b2616b0e5a8 username/sinatra:v2

### App

    # Execute box's command
    docker run ubuntu:14.04 echo 'Hello'

    # Containers we ran interactively in the foreground.
    docker run -t -i ubuntu:14.04 /bin/bash

    # One container we ran daemonized in the background.
    docker run -d ubuntu:14.04 /bin/sh -c "while true; do echo hello world; sleep 1; done"
