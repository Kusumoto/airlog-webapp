wget https://sonarsource.bintray.com/Distribution/sonar-scanner-cli/sonar-scanner-2.8.zip -O ~/scanner.zip
unzip ~/scanner.zip -d ~

rm -rf node_modules

cat << EOF > sonar-project.properties
  sonar.host.url=https://sonar.kusumotolab.com
  sonar.projectKey=com.kusumotolab.samfwebservice:master
  sonar.projectName=AIRLOG-WebService
  sonar.projectVersion=2.0.1
  sonar.sources=.
EOF

~/sonar-scanner-2.8/bin/sonar-scanner