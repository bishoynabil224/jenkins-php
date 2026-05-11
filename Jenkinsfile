pipeline {
    agent { label 'php-lab' } 

    stages {
        stage('Run Unit Tests') {
            steps {
                catchError(buildResult: 'SUCCESS', stageResult: 'FAILURE') {
                    
                    sh 'phpunit --do-not-cache-result --log-junit results.xml tests/'
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
    }
}
