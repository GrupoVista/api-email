import docker

client = docker.from_env()

client.images.build(path=".",tag="grupovista/api-email:0.0.3")
client.images.push(repository="grupovista/api-email", tag="0.0.3")