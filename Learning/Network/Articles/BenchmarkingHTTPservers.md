> http://www.cambus.net/benchmarking-http-servers/

## ApacheBench

ApacheBench (ab) is a tool bundled with the Apache HTTP server which can be used to benchmark any kind of HTTP server.
To benchmark localhost (100000 requests with 100 concurrent connections):

```
ab -c100 -n10000 http://127.0.0.1/
Sample output :
Server Software:        nginx/1.6.2
Server Hostname:        127.0.0.1
Server Port:            80

Document Path:          /
Document Length:        612 bytes

Concurrency Level:      100
Time taken for tests:   6.965 seconds
Complete requests:      100000
Failed requests:        0
Write errors:           0
Total transferred:      84400000 bytes
HTML transferred:       61200000 bytes
Requests per second:    14357.89 [#/sec] (mean)
Time per request:       6.965 [ms] (mean)
Time per request:       0.070 [ms] (mean, across all concurrent requests)
Transfer rate:          11834.05 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       3
Processing:     2    7   1.0      7      13
Waiting:        0    4   1.9      4      12
Total:          2    7   1.0      7      13

Percentage of the requests served within a certain time (ms)
  50%      7
  66%      7
  75%      8
  80%      8
  90%      8
  95%      8
  98%      9
  99%     11
 100%     13 (longest request)
```

Beware though, ab is single-threaded and this can be a bottleneck when benchmarking high performance HTTP servers, especially when testing on localhost.

## Siege

A better alternative is siege, which is multi-threaded and has some interesting features such as the ability to use multiple different URLs during tests.
To benchmark localhost (100000 requests with 100 concurrent connections) :

```
siege -b -c100 -r100 http://127.0.0.1/
The -b option allows running throughput benchmarking tests without delay between simulated users.
```

Sample output :

```
** SIEGE 3.0.8
** Preparing 100 concurrent users for battle.
The server is now under siege...

Transactions:		       10000 hits
Availability:		      100.00 %
Elapsed time:		        1.02 secs
Data transferred:	        5.84 MB
Response time:		        0.01 secs
Transaction rate:	     9770.99 trans/sec
Throughput:		        5.70 MB/sec
Concurrency:		       52.74
Successful transactions:       10000
Failed transactions:	           0
Longest transaction:	        0.02
Shortest transaction:	        0.00
```

## wrk

Wrk is a promising HTTP benchmarking tool with a modern architecture, which is also scriptable with Lua.
To benchmark localhost (for 10 seconds with 100 concurrent connections) :

```
wrk -c100 http://127.0.0.1/
```

Sample output :

```
Running 10s test @ http://127.0.0.1/
  2 threads and 100 connections
  Thread Stats   Avg      Stdev     Max   +/- Stdev
    Latency     4.02ms  794.02us  12.57ms   90.71%
    Req/Sec    13.27k     2.30k   30.50k    77.92%
  254557 requests in 10.00s, 206.10MB read
Requests/sec:  25455.48
Transfer/sec:     20.61MB
```
