# Stage 1: Runtime with Maven
FROM maven:3.8.3-openjdk-17 AS stage1

WORKDIR /app

COPY spring-petclinic/ ./

# Download dependencies
RUN mvn dependency:go-offline -B

# Build the jar
RUN mvn package -DskipTests


# Stage 2: Runtime with Eclipse Temurin JDK
FROM eclipse-temurin:17-jdk AS stage2

WORKDIR /app

# Copy the jar file from stage 1 to WORKDIR and rename it to app.jar
COPY --from=stage1 /app/target/*.jar app.jar

EXPOSE 8080

ENTRYPOINT ["java", "-jar", "app.jar"]