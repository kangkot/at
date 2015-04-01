### PEM authentication

    cd ~/.ssh \
      && ssh-keygen -b 2048 -f identity -t rsa \
      && cat identity.pub >> .ssh/authorized_keys

### Key login

```bash
mkdir .ssh
cat id_rsa.pub >> .ssh/authorized_keys
chmod go-w ~
chmod 700 ~/.ssh
chmod 600 ~/.ssh/authorized_keys
```

### Create sock

    alias sock='ssh -D 127.0.0.1:8989 -fNg host'

### Others

1. [bash-git-prompt](https://github.com/magicmonty/bash-git-prompt)
1. [shrc](https://github.com/Russell91/sshrc) — bring your .bashrc, .vimrc, etc. with you when you ssh
2. http://www.theunixschool.com/2012/06/sed-25-examples-to-delete-line-or.html
3. http://www.theunixschool.com/2012/04/what-is-cdpath.html
4. http://www.theunixschool.com/2010/06/what-is-suid.html

#### tar

    # Uncompress a .tar.bz2 file
    tar -xjvf example.tar.bz2
    
    # Compress a directory
    tar -zcvf prog-1-jan-2005.tar.gz /home/jerry/prog

#### [flush dns cache](http://www.cyberciti.biz/tips/linux-unix-bsd-openssh-server-best-practices.html)

    dscacheutil -flushcache

### Commands

1. [osquery by Facebook](https://github.com/facebook/osquery) SQL powered operating system instrumentation and monitoring.

## Syntax

```bash
# If sub string
string='My long string';
if [[ $string == *"My long"* ]] then; echo "It's there!"; fi
```
