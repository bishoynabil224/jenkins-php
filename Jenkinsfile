pipeline {
    agent { label 'php-lab' } 

    stages {
     
        
        stage('Run Unit Tests') {
            steps {
                catchError(buildResult: 'SUCCESS', stageResult: 'FAILURE') {
                    
                    sh 'phpunit --no-cache --log-junit results.xml tests/'
                }
            }
        }

        stage('Display Results') {
            steps {
                
                junit 'results.xml'
            }
        }
    }

    post {
        always {
            echo 'Pipeline job finished.'
        }
        success {
            echo 'Congratulations! All tests passed successfully.'
        }
        failure {
            echo 'The code failed the tests! Please check the Test Result trend for details.'
        }
    }
}
