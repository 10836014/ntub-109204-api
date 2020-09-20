CREATE TABLE `users` (
  `userId` int PRIMARY KEY AUTO_INCREMENT,
  `userName` varchar(255) UNIQUE NOT NULL,
  `gender` varchar(255) DEFAULT "female",
  `birthday` datetime DEFAULT (now()),
  `mail` varchar(255),
  `userPhoto` varchar(255)
);

CREATE TABLE `chatrooms` (
  `chatroomId` int PRIMARY KEY,
  `userId` int,
  `nickName` varchar(255),
  `roleId` int(11),
  `roleName` varchar(255),
  `rolePhoto` varchar(255),
  `habbitName` varchar(255),
  `habbitId` int(11),
  `signedTime` datetime,
  `originalIntention` varchar(255),
  `goodnees` varchar(255),
  `badnees` varchar(255),
  `created_at` datetime DEFAULT (now()),
  `updated_at` datetime DEFAULT (now())
);

CREATE TABLE `remindTime` (
  `remindId` int,
  `chatroomId` int,
  `remindTime` datetime
);

CREATE TABLE `posts` (
  `postId` int PRIMARY KEY,
  `userId` int,
  `title` varchar(255),
  `content` varchar(255) COMMENT 'When order created'
);

CREATE TABLE `likes` (
  `likeId` int PRIMARY KEY,
  `postId` int,
  `userId` int NOT NULL
);

CREATE TABLE `habbitCat` (
  `habbitId` int PRIMARY KEY,
  `habbitName` varchar(255)
);

CREATE TABLE `roleCat` (
  `roleId` int PRIMARY KEY,
  `roleName` varchar(255)
);

CREATE INDEX `chatrooms_index_0` ON `chatrooms` (`roleId`);

CREATE INDEX `chatrooms_index_1` ON `chatrooms` (`habbitId`);

ALTER TABLE `likes` ADD FOREIGN KEY (`postId`) REFERENCES `posts` (`postId`);

ALTER TABLE `chatrooms` ADD FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

ALTER TABLE `posts` ADD FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

ALTER TABLE `remindTime` ADD FOREIGN KEY (`chatroomId`) REFERENCES `chatrooms` (`chatroomId`);

ALTER TABLE `likes` ADD FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

ALTER TABLE `chatrooms` ADD FOREIGN KEY (`habbitId`) REFERENCES `habbitCat` (`habbitId`);

ALTER TABLE `chatrooms` ADD FOREIGN KEY (`roleId`) REFERENCES `roleCat` (`roleId`);

